@extends('dashboards.admin')
@section('mainbody')
<style>
    .text-white{color:#fff;}
</style>
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <!---
<div class="panel-heading">
<h3 class="panel-title">Weekly Overview</h3>
<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
</div>
---->
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-download"></i></span>
                    <p>
                        <span class="number">1,252</span>
                        <span class="title">Processed</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                    <p>
                        <span class="number">203</span>
                        <span class="title">Unprocessed</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                    <p>
                        <span class="number">274,678</span>
                        <span class="title">Customers</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon text-white">&#x20A6</span>
                    <p>
                        <span class="number">3590987</span>
                        <span class="title">Total income</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-download"></i></span>
                    <p>
                        <span class="number">1,252</span>
                        <span class="title">Transactions today</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                    <p>
                        <span class="number">203</span>
                        <span class="title">Courts</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                    <p>
                        <span class="number">274,678</span>
                        <span class="title">Visitors</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon text-white">&#x20A6</span>
                    <p>
                        <span class="number">350,000</span>
                        <span class="title">Income today</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel-heading">
                    
                    <p class="panel-subtitle">Affidavit processing</p>
                </div>
                <div id="headline-chart" class="ct-chart"></div>
            </div>
            <div class="col-md-6">
                <div class="panel-heading">
                    
                    <p class="panel-subtitle">Client statistics</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
@stop
