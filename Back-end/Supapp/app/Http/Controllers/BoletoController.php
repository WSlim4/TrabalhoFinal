<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Eduardokum\LaravelBoleto\Pessoa;
use Eduardokum\LaravelBoleto\Boleto\Banco\Bb;
use Eduardokum\LaravelBoleto\Boleto\Render\Pdf;
use App\Customer;
use App\Supplier;
use App\Purchase;

class BoletoController extends Controller
{
    //
    public function boleto($id)
    {
        $purchase = Purchase::find($id);
        $customer = $purchase->customer;
        $beneficiario = new Pessoa(
            [
                'nome'      => 'Suppap',
                'endereco'  => 'Rua EJCM, Número 20',
                'documento' => '99.999.999/9999-99',
            ]
        );
        $pagador = new Pessoa(
            [
                'nome'      => $customer->name,
                'endereco'  => $customer->address,
                'documento' => $customer->cnpj,
            ]
        );
        $boleto = new Bb(
            [
                'logo'                   => realpath(__DIR__ . '../../../../../vendor/eduardokum/laravel-boleto/logos/001.png'),
                'dataVencimento'         => Carbon::today()->addWeek(1),
                'valor'                  => $purchase->price_paid,
                'multa'                  => false,
                'juros'                  => false,
                'numero'                 => $purchase->id,
                'numeroDocumento'        => 000,
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'agencia'                => 1111,
                'carteira'               => 11,
                'convenio'               => 1234567,
                'conta'                  => 22222,
            ]
        );
        $pdf = new Pdf();
        $pdf->addBoleto($boleto);
        //$pdf->gerarBoleto($pdf::OUTPUT_SAVE, __DIR__.'bb.pdf');
        $pdf->gerarBoleto($dest = Pdf::OUTPUT_STANDARD, $save_path = null);
    }
}
