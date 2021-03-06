<?php

namespace App\Http\Controllers\Movil;

use App\Car;
use App\CarDetailSuscription;
use App\CarSubscription;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wash_type;
use App\PlanTypeWash;
use PhpParser\Node\Expr\Cast\Array_;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $suscripciones = CarSubscription::with('car', 'suscriptions.plans')->distinct('plan_id')->whereHas('car.clients', function ($query) use ($request) {
        //     $query->where('id', '=',  $request->user()->id);
        // })->orderby('updated_at', 'ASC')->get();
        /*=============================================
        Solicitud solamente suscripciones activas
        =============================================*/
        /*$suscripciones = CarSubscription::with('car','suscriptions.plans')
            ->whereHas('suscriptions', function ($query){
                $query->where('state', '=', 1);
            })
            ->whereHas('car.clients', function ($query) use ($request){
                $query->where('id', '=',  $request->user()->id);
            })->get();*/
        // return response()->json(['suscripciones' => $suscripciones]);

        $suscripciones = CarSubscription::with(['plans', 'carDetail.washType'])
        ->whereHas('car.clients', function ($query) use ($request) {
            $query->where('id', '=',  $request->user()->id);
        })->orderby('updated_at', 'ASC')->get();

        return response()->json(['suscripciones' => $suscripciones], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $suscription = new CarSubscription([
            'plan_id'   => $request->plan_id,
            'cars_id'   => $request->car_id,
            'date_start' => Carbon::now(),
            'date_end' => Carbon::now()->addMonths(2),
        ]);
        $suscription->save();

        $typeWash = PlanTypeWash::where('plan_id', $request->plan_id)->get();

        foreach ($typeWash as $obj) {
            $detail_suscription = new CarDetailSuscription([
                'carsus_id' => $suscription->id,
                'plan_type_id' => $obj->id,
                'quantity' =>  $obj->quantity,
            ]);
            $detail_suscription->save();
        }
        return response()->json([
            'message' => 'Creado exitosamente!',
            'objeto' => $detail_suscription,
            'objeto1' => $suscription,
        ], 201);
    }

    public function getTypes(Request $request)
    {
        // dd([$request->plan_id, $request->name]);
        $typeWash = PlanTypeWash::where('plan_id', $request->plan_id)->get();

        $new = [];
        $i = 0;
        // foreach ($typeWash as $obj) {
        //     $new[$i] = $obj;
            
        //     return response()->json([
        //         'otra resp' => $typeWash,
        //         'otra resp2' => $obj,
        //         'otra resp3' => $new,
        //     ]);

        //     $i++;
        // }
        return response()->json([
            'otra resp' => $typeWash,
            // 'id' => $id
        ], 201);

        // $suscripciones = CarSubscription::with('car')->whereHas('car.clients', function ($query) use ($request) {
        //     $query->where('id', '=',  $request->user()->id);
        // })->orderby('updated_at', 'ASC')->get();
        // $suscripciones = CarSubscription::with(['car','plans'])->whereHas('car.clients', function ($query) use ($request) {
        //     $query->where('id', '=',  $request->user()->id);
        // })->orderby('updated_at', 'ASC')->get();

        // return response()->json(['suscripciones' => $suscripciones], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
