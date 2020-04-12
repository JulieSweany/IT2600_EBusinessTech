<?php
/*
// Add an item to the cart using $cart parameter
function add_item($cart, $key, $quantity) {
    global $products;
    global $cart;
    if ($quantity < 1) return;

    // If item already exists in cart, update quantity
    if (isset($cart[$key])) {
        $quantity += $cart[$key]['qty'];
        update_item($cart, $key, $quantity);
        $_SESSION['cart13'] = $cart;
        return;
    }

    // Add item
    $cost = $products[$key]['cost'];
    $total = $cost * $quantity;
    $item = array(
        'name' => $products[$key]['name'],
        'cost' => $cost,
        'qty'  => $quantity,
        'total' => $total
    );
    $cart[$key] = $item;
    $_SESSION['cart13'] = $cart;
}
*/

// Create namespace
namespace sweany\cart {

// Add an item to the cart passing cart by reference
function add_item(&$cart, $key, $quantity) {
    global $products;
    //global $cart;
    if ($quantity < 1) return;

    // If item already exists in cart, update quantity
    if (isset($cart[$key])) {
        $quantity += $cart[$key]['qty'];
        update_item($cart, $key, $quantity);
        $_SESSION['cart13'] = $cart;
        //return;
    }

    // Add item
    $cost = $products[$key]['cost'];
    $total = $cost * $quantity;
    $item = array(
        'name' => $products[$key]['name'],
        'cost' => $cost,
        'qty'  => $quantity,
        'total' => $total
    );
    $cart[$key] = $item;
    $_SESSION['cart13'] = $cart;
}
/*
// Update an item in the cart using $cart paramenter
function update_item($cart, $key, $qty) {
    global $products;
    global $cart; $quantity = (int) $qty;
    if (isset($cart[$key])) {
        if ($quantity <= 0) {
            unset($cart[$key]);
            $_SESSION['cart13'] = $cart;
        } else {
            $cart[$key]['qty'] = $quantity;
            $total = $cart[$key]['cost'] *
                     $cart[$key]['qty'];
            $cart[$key]['total'] = $total;
            $_SESSION['cart13'] = $cart;
        }
    }
}
*/

// Update an item in the cart passing cart by reference
function update_item(&$cart, $key, $qty) {
    global $products;
    //global $cart; 
    $quantity = (int) $qty;
    if (isset($cart[$key])) {
        if ($quantity <= 0) {
            unset($cart[$key]);
            //$_SESSION['cart13'] = $cart;
        } else {
            $cart[$key]['qty'] = $quantity;
            $total = $cart[$key]['cost'] *
                     $cart[$key]['qty'];
            $cart[$key]['total'] = $total;
            //$_SESSION['cart13'] = $cart;
        }
    }
}
/*
// Get cart subtotal using cart parameter
function get_subtotal($cart) {
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['total'];
    }
    $subtotal_f = number_format($subtotal, 2);
    return $subtotal_f;
}
*/


// Get cart subtotal passing cart by reference

function get_subtotal($cart) {
    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['total'];
    }
    $subtotal_f = number_format($subtotal, 2);
    return $subtotal_f;
}


// get_subtotal with optional parameter
/*function get_subtotal($cart, $decimals) {
    $decimals = func_get_arg(1);

    $subtotal = 0;
    foreach ($cart as $item) {
        $subtotal += $item['total'];
    }
    //$subtotal_f = number_format($subtotal, 2);
    $subtotal_f = number_format($subtotal, $decimals);
    return $subtotal_f;
}
*/
}
?>