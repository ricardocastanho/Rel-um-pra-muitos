<?php

use App\Produto;
use App\Categoria;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    $cats = Categoria::all();
    if (count($cats) == 0) {
        echo "<h4>Voce nao possui nenhuma categoria cadastrada</h4>";
    }
    else {
        foreach($cats as $c) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
        }
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if (count($prods) == 0) {
        echo "<h4>Voce nao possui nenhum produto cadastrado</h4>";
    }
    else {
        echo "<table>";
        echo "<thead>
                <tr>
                    <td>Nome</td>
                    <td>Categoria</td>
                </tr>
               </thead>";
        echo "<tbody>";
        foreach($prods as $p) {
            echo "<tr>";
            echo "<td>" . $p->nome . "</td>";
            // echo "<td>" . $p->categoria_id . "</td>";
            echo "<td>" . $p->categoria->nome . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
});


Route::get('/categoriasprodutos', function () {
    $cats = Categoria::all();
    if (count($cats) === 0) {
        echo "<h4>Voce nao possui nenhuma categoria cadastrada</h4>";
    }
    else {
        foreach($cats as $c) {
            echo "<h4>" . $c->id . ") " . $c->nome . "</h4>";
            $prods = $c->produtos;
            if (count($prods) > 0) {
                echo "<ul>";
                foreach($prods as $p) {
                    echo "<li>" . $p->nome . "</p>";
                }
                echo "</ul>";
            }
            else {
                echo "<h4>Categoria nao possui produtos</h4>";
            }
            echo "<hr>";
        }
    }
});


Route::get('/categoriasprodutos/json', function () {
    $cats = Categoria::with("produtos")->get();
    return $cats->toJson();
});


Route::get('/adicionarproduto', function () {
    $cat = Categoria::find(1);
    $prod = new Produto();
    $prod->nome = "MEU NOVO produto adicionado";
    $prod->categoria()->associate($cat);
    $prod->save();
    return $prod->toJson();
});

Route::get('/desassociarproduto/{id}', function ($id) {
    $prod = Produto::find($id);
    if (isset($prod)) {
        $prod->categoria()->dissociate();
        $prod->save();
        return $prod->toJson();
    }
    return "Produto nao encontrado";
});

Route::get('/adicionarproduto/{cat}', function ($catid) {
    $cat = Categoria::with('produtos')->find($catid);
    $prod = new Produto();

    $prod->nome = "Novo produto adicionado";

    if(isset($cat)) {
        $cat->produtos()->save($prod);
    }
    $cat->load('produtos'); //Atualizando produtos
    return $cat->toJson();;
});

Route::get('/produtosjson', function () {
    $prods = Produto::with('categoria')->get();
    return $prods;
});

