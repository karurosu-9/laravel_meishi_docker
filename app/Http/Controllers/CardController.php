<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;
use App\Models\Card;

class CardController extends Controller
{

    public function index(Request $request)
    {
        $cards = Card::all();
        $data = [
            'cards' => $cards,
        ];
        return view('card.index', $data);
    }

    public function add(Request $request)
    {
        return view('card.add');
    }

    public function create(CardRequest $request)
    {
        $card = new Card;
        $form = $request->validated();
        $card->timestamps = false;
        $card->fill($form)->save();
        return redirect()->route('card.list');
    }

    public function show(Card $card)
    {
        $data = [
            'card' => $card,
        ];
        return view('card.show', $data);
    }

    public function edit(Card $card)
    {
        $data = [
            'card' => $card,
        ];
        return view('card.edit', $data);
    }

    public function update(Card $card, CardRequest $request)
    {
        $form = $request->validated();
        $card->timestamps = false;
        $card->fill($form)->save();
        return redirect()->route('card.list');
    }

    public function delete(Card $card)
    {
        $data = [
            'card' => $card,
        ];
        return view('card.delete', $data);
    }

    public function remove(Card $card)
    {
        $card->delete();
        return redirect()->route('card.list');
    }
}
