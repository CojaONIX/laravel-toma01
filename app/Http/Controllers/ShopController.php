<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = [
            [
                'title' => 'Lorem ipsum dolor sit amet.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, sapiente repellat. Veniam illum adipisci aut fugiat, dicta molestias eum ab accusantium aperiam qui ex veritatis ipsam corporis quia perferendis alias reiciendis et ad. Vitae adipisci dolore harum tenetur doloribus molestiae sequi recusandae perspiciatis repellat autem. Recusandae non sint provident atque.',
                'image' => "https://picsum.photos/id/4/300/100.jpg",
                'discount' => true
            ],
            [
                'title' => 'Lorem, ipsum dolor.',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia provident suscipit odit odio sequi exercitationem aspernatur quisquam maiores nostrum! Enim id soluta rerum fugit hic doloremque nihil temporibus, ullam non autem corrupti, fuga esse incidunt omnis saepe iusto earum nam? Dicta illo laudantium, suscipit reprehenderit cum tempore. Sapiente dolor nisi a eius dolores provident sunt autem consequuntur similique perferendis rerum quibusdam, aliquam recusandae esse molestias alias fugiat. Dolores, quas, accusantium, nisi reiciendis velit inventore dolorem commodi nihil optio est rerum?',
                'image' => "https://picsum.photos/id/5/300/100.jpg",
                'discount' => false
            ],
            [
                'title' => 'Lorem ipsum dolor sit.',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, accusantium quis. Velit modi quaerat quae molestias veritatis voluptate, temporibus illo, nostrum est deserunt qui amet recusandae obcaecati? At, harum autem? Sapiente dolorum excepturi, libero beatae temporibus veniam pariatur adipisci unde voluptas assumenda officiis atque nulla. Amet cumque fugit rem illum veritatis commodi, fugiat eius impedit repellendus veniam nulla quia voluptas.',
                'image' => "https://picsum.photos/id/6/300/100.jpg",
                'discount' => true
            ]
        ];
        return view('shop', compact('products'));
    }
}
