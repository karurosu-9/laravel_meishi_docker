<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitumori;
use App\Models\Card;
use App\Models\MyCorp;
use App\Http\Requests\MitumoriRequest;
use Illuminate\Support\Facades\DB;
use App\Consts\FormcountConsts;

class MitumoriController extends Controller
{
    public function addPrice(Request $request)
    {
        $cards = Card::all();
        $data = [
            'cards' => $cards,
        ];
        return view('mitumori.add_price', $data);
    }

    public function addNote(Request $request)
    {
        $corp = $request->corp;
        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
        }

        $data = [
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'corp' => $corp,
            'tekiyo' => $tekiyo,
            'tanka' => $tanka,
            'suryo' => $suryo,
            'kingaku' => $kingaku,
        ];
        return view('mitumori.add_note', $data);
    }

    public function addHosoku(Request $request)
    {
        $corp = $request->corp;

        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
            $biko[$i] = $request->input('biko' . $i);
        }

        $data = [
            'corp' => $corp,
            'tekiyo' => $tekiyo,
            'tanka' => $tanka,
            'suryo' => $suryo,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
        ];
        return view('mitumori.add_hosoku', $data);
    }

    public function addDate(Request $request)
    {
        $year = date('Y');
        $month = date('n');
        $date = date('d');

        $corp = $request->corp;

        $total_price = 0;
        $all_total_price = 0;
        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
            $biko[$i] = $request->input('biko' . $i);
        }

        $total_price = $kingaku;

        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $all_total_price += (int)$total_price[$i];

        }

        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $request->input('hosoku' . $i);
        }


        $data = [
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'corp' => $corp,
            'all_total_price' => $all_total_price,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'hosoku' => $hosoku,
        ];
        return view('mitumori.add_date', $data);
    }

    public function complete(Request $request)
    {
        $count = session()->get('count', 1);
        $count++;

        session()->put('count', $count);

        $Y = date('Y');
        $year = $request->year;
        $month = $request->month;
        $date = $request->date;
        $date_new = $year . '年' . $month . '月' . $date . '日';

        $corp = $request->corp;

        $my_corp = MyCorp::all()->first();
        $num = $Y . sprintf('%03d', $count);

        $postal = $my_corp['postal'];
        preg_match('/(.{3})(.{4})/', $postal, $match);
        $postal_new = $match[1] . '-' . $match[2];

        $tel = $my_corp['tel'];
        preg_match('/(.{3})(.{3})(.{4})/', $tel, $match);
        $tel_new = 'TEL ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        $fax = $my_corp['fax'];
        preg_match('/(.{3})(.{3})(.{4})/', $fax, $match);
        $fax_new = 'FAX ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        $total_price = 0;
        $all_total_price = 0;
        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
            $biko[$i] = $request->input('biko' . $i);
        }

        $total_price = $kingaku;

        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $all_total_price += (int)$total_price[$i];
        }
        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $request->input('hosoku' . $i);
        }

        $data = [
            'corp' => $corp,
            'my_corp' => $my_corp,
            'postal_new' => $postal_new,
            'tel_new' => $tel_new,
            'fax_new' => $fax_new,
            'all_total_price' => $all_total_price,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'hosoku' => $hosoku,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'num' => $num,
            'date_new' => $date_new,
        ];
        return view('mitumori.complete', $data);
    }

    public function register(MitumoriRequest $request)
    {
        $mitumori = new Mitumori;
        $form = $request->validated();
        $mitumori->timestamps = false;
        $mitumori->fill($form)->save();
        return redirect()->route('mitumori.list');
    }

    public function list(Mitumori $mitumori)
    {
        //$mitumori= Mitumori::select('*')->orderBy('date', 'desc')->get();
        $mitumori_list = $mitumori->orderBy('date', 'desc')->get();
        $data = [
            'mitumori_list' => $mitumori_list,
        ];
        return view('mitumori.list', $data);
    }

    public function show(Mitumori $mitumori)
    {
        $my_corp = MyCorp::all()->first();

        $postal = $my_corp['postal'];
        preg_match('/(.{3})(.{4})/', $postal, $match);
        $postal_new = $match[1] . '-' . $match[2];

        $tel = $my_corp['tel'];
        preg_match('/(.{3})(.{3})(.{4})/', $tel, $match);
        $tel_new = 'TEL ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        $fax = $my_corp['fax'];
        preg_match('/(.{3})(.{3})(.{4})/', $fax, $match);
        $fax_new = 'FAX ' . $match[1] . '-' . $match[2] . '-' . $match[3];


        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $mitumori['tekiyo' . $i];
            $suryo[$i] = $mitumori['suryo' . $i];
            $tanka[$i] = $mitumori['tanka' . $i];
            $kingaku[$i] = $mitumori['kingaku' . $i];
            $biko[$i] = $mitumori['biko' . $i];
        }

        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $mitumori['hosoku' . $i];
        }

        $total_price = $mitumori['total_price'];

        $data = [
            'mitumori' => $mitumori,
            'my_corp' => $my_corp,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'postal_new' => $postal_new,
            'tel_new' => $tel_new,
            'fax_new' => $fax_new,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'hosoku' => $hosoku,
            'total_price' => $total_price,
        ];
        return view('mitumori.show', $data);
    }

    public function showBranch(Mitumori $mitumori, Request $request)
    {
        $mitumori = $request->id;
        if ($request->has('edit')) {
            return redirect()->route('mitumori.edit.price', ['mitumori' => $mitumori]);
        }

        if ($request->has('delete')) {
            return redirect()->route('mitumori.delete', ['mitumori' => $mitumori]);
        }
    }

    public function editPrice(Mitumori $mitumori)
    {

        $data = [
            'mitumori' => $mitumori,
        ];
        return view('mitumori.edit_price', $data);
    }

    public function editNote(Mitumori $mitumori, Request $request)
    {
        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
        }

        $data= [
            'mitumori' => $mitumori,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
        ];
        return view('mitumori.edit_note', $data);
    }

    public function editHosoku(Mitumori $mitumori, Request $request)
    {

        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
            $biko[$i] = $request->input('biko' . $i);
        }

        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $request->input('hosoku' . $i);
        }

        $data = [
            'mitumori' => $mitumori,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'hosoku' => $hosoku,
        ];
        return view('mitumori/edit_hosoku', $data);
    }

    public function editDate(Mitumori $mitumori, Request $request)
    {
        $year = date('Y');
        $month = date('n');
        $date = date('d');

        $my_corp = MyCorp::all()->first();

        $total_price = 0;
        $all_total_price = 0;
        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
            $biko[$i] = $request->input('biko' . $i);
        }

        $total_price = $kingaku;

        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $all_total_price += (int)$total_price[$i];
        }

        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $request->input('hosoku' . $i);
        }

        $data = [
            'mitumori' => $mitumori,
            'my_corp' => $my_corp,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'total_price' => $total_price,
            'all_total_price' => $all_total_price,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'hosoku' => $hosoku,
        ];
        return view('mitumori.edit_date', $data);
    }

    public function editComplete(Mitumori $mitumori, Request $request)
    {
        $count = session()->get('count', 1);
        $count++;

        session()->put('count', $count);

        $Y = date('Y');


        $my_corp = MyCorp::all()->first();

        $num = $Y . sprintf('%03d', $count);

        $postal = $my_corp['postal'];
        preg_match('/(.{3})(.{4})/', $postal, $match);
        $postal_new = $match[1] . '-' . $match[2];

        $tel = $my_corp['tel'];
        preg_match('/(.{3})(.{3})(.{4})/', $tel, $match);
        $tel_new = 'TEL ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        $fax = $my_corp['fax'];
        preg_match('/(.{3})(.{3})(.{4})/', $fax, $match);
        $fax_new = 'FAX ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        $total_price = 0;
        $all_total_price = 0;
        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $request->input('tekiyo' . $i);
            $suryo[$i] = $request->input('suryo' . $i);
            $tanka[$i] = $request->input('tanka' . $i);
            $kingaku[$i] = $request->input('kingaku' . $i);
            $biko[$i] = $request->input('biko' . $i);
        }

        $total_price = $kingaku;

        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $all_total_price += (int)$total_price[$i];
        }

        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $request->input('hosoku' . $i);
        }

        $year = $request->year;
        $month = $request->month;
        $date = $request->date;
        $date_new = $year . '年' . $month . '月' . $date . '日';
        $data = [
            'date_new' => $date_new,
            'mitumori' => $mitumori,
            'my_corp' => $my_corp,
            'postal_new' => $postal_new,
            'tel_new' => $tel_new,
            'fax_new' => $fax_new,
            'all_total_price' => $all_total_price,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'hosoku' => $hosoku,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'num' => $num,
        ];
        return view('mitumori.edit_complete', $data);
    }

    public function update(Mitumori $mitumori, MitumoriRequest $request)
    {
        $form = $request->validated();
        $mitumori->timestamps = false;
        $mitumori->fill($form)->save();
        return redirect()->route('mitumori.edit.show', ['mitumori' => $mitumori]);
    }

    public function editShow(Mitumori $mitumori, Request $request)
    {
        $my_corp = MyCorp::all()->first();

        $postal = $my_corp['postal'];
        preg_match('/(.{3})(.{4})/', $postal, $match);
        $postal_new = $match[1] . '-' . $match[2];

        $tel = $my_corp['tel'];
        preg_match('/(.{3})(.{3})(.{4})/', $tel, $match);
        $tel_new = 'TEL ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        $fax = $my_corp['fax'];
        preg_match('/(.{3})(.{3})(.{4})/', $fax, $match);
        $fax_new = 'FAX ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $mitumori['tekiyo' . $i];
            $suryo[$i] = $mitumori['suryo' . $i];
            $tanka[$i] = $mitumori['tanka' . $i];
            $kingaku[$i] = $mitumori['kingaku' . $i];
            $biko[$i] = $mitumori['biko' . $i];
        }

        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $mitumori['hosoku' . $i];
        }

        $total_price = $mitumori['total_price'];

        $data = [
            'mitumori' => $mitumori,
            'my_corp' => $my_corp,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'postal_new' => $postal_new,
            'tel_new' => $tel_new,
            'fax_new' => $fax_new,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'hosoku' => $hosoku,
            'total_price' => $total_price,
        ];
        return view('mitumori.edit_show', $data);
    }

    public function print(Mitumori $mitumori)
    {
        $date = date('Y年n月d日');
        $mitumori->update(['date' => $date]);
        $my_corp = MyCorp::all()->first();

        $postal = $my_corp['postal'];
        preg_match('/(.{3})(.{4})/', $postal, $match);
        $postal_new = $match[1] . '-' . $match[2];

        $tel = $my_corp['tel'];
        preg_match('/(.{3})(.{3})(.{4})/', $tel, $match);
        $tel_new = 'TEL ' . $match[1] . '-' . $match[2] . '-' . $match[3];

        $fax = $my_corp['fax'];
        preg_match('/(.{3})(.{3})(.{4})/', $fax, $match);
        $fax_new = 'FAX ' . $match[1] . '-' . $match[2] . '-' . $match[3];


        for ($i = 1; $i <= FormcountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $mitumori['tekiyo' . $i];
            $suryo[$i] = $mitumori['suryo' . $i];
            $tanka[$i] = $mitumori['tanka' . $i];
            $kingaku[$i] = $mitumori['kingaku' . $i];
            $biko[$i] = $mitumori['biko' . $i];
        }

        for ($i = 1; $i <= FormcountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $mitumori['hosoku' . $i];
        }

        $total_price = $mitumori['total_price'];

        $data = [
            'mitumori' => $mitumori,
            'my_corp' => $my_corp,
            'form_not_hosoku' => FormcountConsts::FORM_NOT_HOSOKU,
            'form_hosoku' => FormcountConsts::FORM_HOSOKU,
            'postal_new' => $postal_new,
            'tel_new' => $tel_new,
            'fax_new' => $fax_new,
            'tekiyo' => $tekiyo,
            'suryo' => $suryo,
            'tanka' => $tanka,
            'kingaku' => $kingaku,
            'biko' => $biko,
            'hosoku' => $hosoku,
            'total_price' => $total_price,
            'date' => $date,
        ];

        return view('mitumori.print', $data);
    }

    public function delete(Mitumori $mitumori)
    {
        $mitumori->delete();
        return view('mitumori.delete');
    }
}
