@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="print">
            <h2>The Requested Domain </h2>
            <div class="domain">{{$domain}}</div>
            <h2>Whois Raw Data</h2>
            <table class="table">
                <tr>
                    <td>
                        <pre>
                            {{ $result['rawdata'][0] }}
                        </pre>
                    </td>
                </tr>
            </table>
            
            <table class="table">
                <tr>
                    <td>Ip Address</td>
                    <td>
                        @foreach((array)$ipv4 as $ip)
                        {{$ip}}<br/>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Nameserver</td>
                    <td>@foreach((array)$result['nameserver'] as $nameserver)
                        {{ $nameserver }}<br/>
                        @endforeach
                    </td>
                </tr>               
                <tr>
                    <td>Content Management System</td>
                    <td>
                        @if($technologies['cms'])
                            {{ $technologies['cms'] }}
                        @else
                            "<b>HTML, XHTML</b>"
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>Server Information</td>
                    <td>
                    
                        @if($server_info['server'])
                            @foreach((array)$server_info['server'] as $server)
                                {{$server}}<br/>
                            @endforeach
                        @else
                            "<b>Sever Info Was Not Avilable</b>"
                        @endif

                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Powered By
                    </td>
                    <td>
                        @if($server_info['poweredby'])
                            {{ $server_info['poweredby'] }}
                        @else
                            {{ $technologies['programming_language'] }}
                        @endif

                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <button id="report" class="btn btn-success pull-right">Print</button>  
        </div>

    </div>

</div>

@endsection
