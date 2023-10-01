@extends('layoutAdmin.layout')
@section('title')  الصفحة الرئيسية  @endsection
@section('body')
<div class="container">
          <!-- Content Row -->
          <div class="row" >

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                    الشركات</div>
                                <div class="font-weight-bold ml-3 text-muted" style="font-size: 28px;">{{$company}}</div>
                            </div>
                            <div class="col-auto ml-3">
                                <i class="fas fa-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 font-weight-bold text-info text-uppercase mb-1">العملاء
                                </div>
                                <div class="font-weight-bold ml-3 text-muted" style="font-size: 28px;">{{$client}}</div>
                            </div>
                            <div class="col-auto ml-3">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
            <!-- Earnings (Monthly) Card Example -->
          
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 font-weight-bold text-success text-uppercase mb-1">
                                    الوظائف</div>
                                <div class="font-weight-bold ml-4 text-muted" style="font-size: 28px;">{{$job}}</div>
                            </div>
                            <div class="col-auto ml-3">
                                <i class="fas fa-wrench fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 font-weight-bold text-success text-uppercase mb-1">
                                    الدورات</div>
                                <div class="font-weight-bold ml-4 text-muted" style="font-size: 28px;">{{$course}}</div>
                            </div>
                            <div class="col-auto ml-3">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Earnings (Monthly) Card Example -->
         

            <!-- Pending Requests Card Example -->
            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 font-weight-bold text-warning text-uppercase mb-1">
                                    المخابر </div>
                                <div class="font-weight-bold ml-3 text-muted" style="font-size: 28px;"> 2 </div>
                            </div>
                            <div class="col-auto ml-3">
                                <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>
        <hr><br>
        <table class="table">
            <tbody>
                <tr>
                    <td style="font-size: 30px"> الشركات  </td>
                    <td style="width: 80%">
                      <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: {{$company}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 30px"> العملاء </td>
                    <td style="width: 80%">
                      <div class="progress">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width:  {{$client}}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
              <tr>
                <td style="font-size: 30px"> الوظائف </td>
                <td style="width: 80%">
                  <div class="progress">
                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width:  {{$job}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td style="font-size: 30px"> الدورات </td>
                <td style="width: 80%">
                  <div class="progress">
                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: {{$course}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
              </tr>
            
            </tbody>
          </table>
 </div>
@endsection