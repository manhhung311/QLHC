<?php

namespace App\Http\Controllers\QuanKho;

use App\Http\Controllers\Controller;
use App\Models\tables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Charts\Chartjs;
use App\Charts\Frappe;
use App\Charts\Highcharts;
use App\Models\Datatable;

class tonKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    //    $danhSach = new tables();
    //     return $danhSach;

        $bar = new Frappe;
        $bar->labels(['One', 'Two', 'Three']);
        $bar->dataset('Element 1', 'bar', [5, 20, 100])->options(
            [
            'color' => '#418bca'
            ]
        );
        $bar->dataset('Element 2', 'bar', [15, 30, 80])->options(
            [
            'color' => '#67c5df'
            ]
        );
        $bar->dataset('Element 3', 'bar', [25, 10, 40])->options(
            [
            'color' => '#F89A14'
            ]
        );

        $line = new Frappe;
        $line->labels(['One', 'Two', 'Three']);
        $line->dataset('Element 1', 'line', [5, 20, 100])->options(
            [
            'color' => '#418bca'
            ]
        );
        $line->dataset('Element 2', 'line', [15, 30, 80])->options(
            [
            'color' => '#F89A14'
            ]
        );
        $line->dataset('Element 3', 'line', [25, 10, 40])->options(
            [
            'color' => '#67c5df'
            ]
        );

        $area = new Highcharts;
        $area->dataset('Element 1', 'area', [5, 20, 100])->options(
            [
            'color' => 'var(--primary)'
            ]
        );
        $area->dataset('Element 2', 'area', [15, 30, 80])->options(
            [
            'color' => 'var(--success)'
            ]
        );
        $area->dataset('Element 3', 'area', [25, 10, 40])->options(
            [
            'color' => 'var(--warning)'
            ]
        );
        $area->labels(['One', 'Two', 'Three']);

        $pie = new Highcharts;
        $pie->labels(['First', 'Second', 'Third']);
        $pie->dataset('Pie chat', 'pie', [5, 10, 20])->options(
            [
            'color' => ['var(--primary)', 'var(--warning)', 'var(--danger)']
            ]
        );

        //return view('admin.laravel_charts', compact('bar', 'line', 'area', 'pie'));
        return view('admin.Quankho.index.suaxoa1',compact('bar', 'line', 'area', 'pie'));
        return compact('line');
    }

    public function databaseCharts()
    {
        /***
         * bar chart by group by age
         */
        $collection = Datatable::all()->groupBy('age');
        $data = $collection->mapWithKeys(
            function ($item, $key) {
                return [$key => count($item->values())];
            }
        );
        $data = $data->sortKeys();

        $bar = new Frappe;
        $bar->labels($data->keys());
        $bar->dataset('Role By Age', 'bar', $data->values())->options(
            [
            'color' => '#418bca'
            ]
        );

        /***
         * bar chart group by country
         */
        $collection = Datatable::all()->groupBy('country');
        $data = $collection->mapWithKeys(
            function ($item, $key) {
                return [$key => count($item->values())];
            }
        );
        $data = $data->sortKeys();

        $country = new Frappe;
        $country->labels($data->keys());
        $country->dataset('Group By Country', 'bar', $data->values())->options(
            [
            'color' => '#F89A14'
            ]
        );

        /**
         * pie chart from above $data
         */

        $pie = new Highcharts;
        $pie->labels($data->keys());
        $pie->dataset('Group By Country', 'pie', $data->values())->options(
            [
            'color' => ['var(--primary)', 'var(--warning)', 'var(--danger)', 'var(--success)', 'var(--info)']
            ]
        );

        /**
         * donut chart from above $data
         */

        $donut = new Chartjs;
        $donut->labels($data->keys());
        $donut->dataset('Group By Country', 'doughnut', $data->values())->options(
            [
            'backgroundColor' => ['#418bca', '#00bc8c', '#67c5df', '#F89A14', '#ef6f6c']
            ]
        );

        /**
         * area chart from above $data
         */

        $area = new Highcharts;
        $area->labels($data->keys());
        $area->dataset('Group By Country', 'area', $data->values())->options(
            [
            'color' => '#00bc8c'
            ]
        );

        /**
         * line chart from above $data
         */

        $line = new Frappe;
        $line->labels($data->keys());
        $line->dataset('Group By Country', 'line', $data->values())->options(
            [
            'color' => ['#418bca']
            ]
        );

        return view('admin.Quankho.index.suaxoa1',['danhMucCanhBao'=>null], compact('bar', 'country', 'pie', 'donut', 'area', 'line'));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
