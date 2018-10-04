@extends('layouts.app')

{{-- @section('style')
<style>
    table, td, a {
	color: #000;
	font: normal normal 12px Verdana, Geneva, Arial, Helvetica, sans-serif
}

h1 {
	font: normal normal 18px Verdana, Geneva, Arial, Helvetica, sans-serif;
	margin: 0 0 5px 0
}

h2 {
	font: normal normal 16px Verdana, Geneva, Arial, Helvetica, sans-serif;
	margin: 0 0 5px 0
}

h3 {
	font: normal normal 13px Verdana, Geneva, Arial, Helvetica, sans-serif;
	color: #008000;
	margin: 0 0 15px 0
}
/* end basic styling                                 */

/* define height and width of scrollable area. Add 16px to width for scrollbar          */
div.tableContainer {
	clear: both;
	border: 1px solid #000;
	
	overflow: auto;
	width: 100%;
}

/* Reset overflow value to hidden for all non-IE browsers. */
html>body div.tableContainer {
	overflow: hidden;
	width: 100%
}

/* define width of table. IE browsers only                 */
div.tableContainer table {
	float: left;
	/* width: 740px */
}

/* define width of table. Add 16px to width for scrollbar.           */
/* All other non-IE browsers.                                        */
html>body div.tableContainer table {
	/* width: 756px */
}

/* set table header to a fixed position. WinIE 6.x only                                       */
/* In WinIE 6.x, any element with a position property set to relative and is a child of       */
/* an element that has an overflow property set, the relative value translates into fixed.    */
/* Ex: parent element DIV with a class of tableContainer has an overflow property set to auto */

thead.fixedHeader tr {
	position: relative;
}

/* set THEAD element to have block level attributes. All other non-IE browsers            */
/* this enables overflow to work on TBODY element. All other non-IE, non-Mozilla browsers */

/* make the TH elements pretty */
thead.fixedHeader th {
	background: #fff;
	border-left: 1px solid #000;
	border-right: 1px solid #000;
	border-top: 1px solid #000;
    border-bottom: 1px solid #000;
	font-weight: normal;
	padding: 4px 3px;
	text-align: left
}

html>body tbody.scrollContent {
	display: block;
	
	overflow: auto;
	width: 100%
}

html>body thead.fixedHeader {
	display: table;
	overflow: auto;
	width: 100%
}

html>body tbody.scrollContent tr {
	width: 100%
}

/* make TD elements pretty. Provide alternating classes for striping the table */
/* http://www.alistapart.com/articles/zebratables/                             */
tbody.scrollContent td, tbody.scrollContent tr.normalRow td {
	background: #FFF;
	border-bottom: none;
	border-left: none;
	border-right: 1px solid #CCC;
	border-top: 1px solid #DDD;
	padding: 2px 3px 3px 4px
}



tbody.scrollContent tr.alternateRow td {
	background: #EEE;
	border-bottom: none;
	border-left: none;
	border-right: 1px solid #CCC;
	border-top: 1px solid #DDD;
	padding: 2px 3px 3px 4px
}
    
</style>
@endsection --}}

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('paymentreceive.store') }}">

        {{ csrf_field() }}
    
        <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }}">
            <label for="company_type" class="col-md-4 control-label">Company Type</label>

            <div class="col-md-6">

                <select id="company_type" class="form-control" name="company_type" autofocus>
                    <option value="mother" selected>Mother</option>
                    <option value="sub">Sub</option>
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('s_company_id') ? ' has-error' : '' }}">
            <label for="s_company_id" class="col-md-4 control-label">Sub Company</label>

            <div class="col-md-6">

                <select id="s_company_id" class="form-control" name="s_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($subcompanylist as $subcompany)
                    <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
                @endforeach
                </select>
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('m_company_id') ? ' has-error' : '' }}">
            <label for="m_company_id" class="col-md-4 control-label">Mother Company</label>
    
            <div class="col-md-6">
    
                <select id="m_company_id" class="form-control" name="m_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($mothercompanylist as $mothercompany)
                    <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('is_gst') ? ' has-error' : '' }}">
            <label for="is_gst" class="col-md-4 control-label">GST Applicable</label>

            <div class="col-md-6">

                <select id="is_gst" class="form-control" name="is_gst" autofocus>
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('gst_type') ? ' has-error' : '' }}">
            <label for="gst_type" class="col-md-4 control-label">GST Type</label>

            <div class="col-md-6">

                <select id="gst_type" class="form-control" name="gst_type" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value = "state">SGST + CGST</option>
                    <option value = "interstate">IGST</option>
                </select>
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('tax_percentage') ? ' has-error' : '' }}">
            <label for="tax_percentage" class="col-md-4 control-label">Tax Percent</label>

            <div class="col-md-6">
                <input id="tax_percentage" type="text" class="form-control" name="tax_percentage" value="{{ old('tax_percentage') }}" required autofocus>

                @if ($errors->has('tax_percentage'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tax_percentage') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('tax_amount') ? ' has-error' : '' }}">
            <label for="tax_amount" class="col-md-4 control-label">Tax Amount</label>

            <div class="col-md-6">
                <input id="tax_amount" type="text" class="form-control" name="tax_amount" value="{{ old('tax_amount') }}" required autofocus>

                @if ($errors->has('tax_amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tax_amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('payment_amount') ? ' has-error' : '' }}">
            <label for="payment_amount" class="col-md-4 control-label">Payment Amount</label>

            <div class="col-md-6">
                <input id="payment_amount" type="text" class="form-control" name="payment_amount" value="{{ old('payment_amount') }}" required autofocus>

                @if ($errors->has('payment_amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('payment_amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('payment_mode') ? ' has-error' : '' }}">
            <label for="payment_mode" class="col-md-4 control-label">Payment Mode</label>

            <div class="col-md-6">

                <select id="payment_mode" class="form-control" name="payment_mode" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value="cheque">Cheque</option>
                    <option value="dd">Demand Draft</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('instrument_no') ? ' has-error' : '' }}">
            <label for="instrument_no" class="col-md-4 control-label">Instrument No</label>

            <div class="col-md-6">
                <input id="instrument_no" type="text" class="form-control" name="instrument_no" value="{{ old('instrument_no') }}">

                @if ($errors->has('instrument_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('instrument_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('instrument_date') ? ' has-error' : '' }}">
            <label for="instrument_date" class="col-md-4 control-label">Instrument Date</label>
    
            <div class="col-md-6">
                <input id="instrument_date" type="date" class="form-control" name="instrument_date" value="{{ old('instrument_date') }}" required autofocus>
            </div>
        </div>

        <!--TABLE VIEW OF POLICY ORDERS-->

        <div class = "from-group">
            <div class="col-md-12">
                <table id = "order_details_table" class="table table-bordered table-striped table-hover">
                    <!-- ///  Table  Headings ///  -->
                    <thead >
                        <tr>
                            <th></th>
                            <th>Application No.</th>
                            <th>Applicient Name</th>
                            <th>KYC</th>
                            <th>Policy Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
    
                    <!-- ///  End of Table  Headings ///  -->
    
                        <!-- ///  Table  Data ///  -->
    
                    <tbody id = "order_details_data">
                        {{-- <tr>
                            <td>
                                <input id = 'checkbox_details' type="checkbox" value="">
                            </td>
                            <td>2</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                            <td>john@example.com</td>
                            <td class="la">----------------</td>
                        </tr> --}}
                        {{--<tr>
                            <td>
                                <label><input type="checkbox" value=""></label>
                            </td>
                            <td>2</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                            <td>john@example.com</td>
                            <td class="la">----------------</td>
                        </tr>
                        <tr>
                            <td>
                                <label><input type="checkbox" value=""></label>
                            </td>
                            <td>2</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                            <td>john@example.com</td>
                            <td class="la">----------------</td>
                        </tr> --}}
                    </tbody>
                    <!-- ///  Table  Data ///  -->

                    <!-- ///  Table  Foot  Ajax  Part ///  -->
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                Gross Amount
                            </td>
                            <td class="la">
                                <div id = "gross_amount">
                                    0.00
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle">Tax Amount</td>
                            <td colspan="4">
                                <div id = "gst_type_result">
                                    CGST<br>
                                    SGST
                                </div>
                            </td>
                            <td class="la">
                                <div id = "gst_type_result_amount">
                                    0.00<br>
                                    0.00
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                Net Amount
                            </td>
                            <td class="la">
                                <div id = "net_amount">
                                    0.00
                                </div>
                            </td>
                        </tr>
                    {{-- @foreach($motherSubCompanyRelation as $relation)<!--//Fetch Records to show ///-->
                        <tr>
                        <td align="center">{{$relation->motherCompany['m_company_name']}}</td>
                        <td align="center">{{$relation->subCompany['s_company_name']}}</td>
                        <td align="center">{{$relation['deal_percentage']}}</td>
                        <td align="center">{{date("d/m/Y",strtotime($relation['percent_created_at']))}}</td>
                        <td align="center">
                            @if($relation['percent_updated_at']!= "")
                                {{date("d/m/Y",strtotime($relation['percent_updated_at']))}}
                            @else
                                {{"Deal has not been updated yet"}}
                            @endif
                        </td>
                        <td align="center"><a href="{{action('MothersubcompanyrelationsController@edit',$relation['company_relation_id'])}}" class="btn btn-success">Edit</a></td>
                        
                    </tr>
                    @endforeach --}}
                    </tfoot>
                    <!-- ///  Table  Foot  Ajax  Part ///  -->
                </table> 
            </div>
        </div>

        <!--END OF TABLE VIEW POLICY ORDER-->

        <div class="form-group{{ $errors->has('payment_details_json') ? ' has-error' : '' }}">
            <label for="payment_details_json" class="col-md-4 control-label">Payment Details JSON</label>

            <div class="col-md-6">
                <input id="payment_details_json" type="text" class="form-control" name="payment_details_json" value="{{ old('payment_details_json') }}" required autofocus>

                @if ($errors->has('payment_details_json'))
                    <span class="help-block">
                        <strong>{{ $errors->first('payment_details_json') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>

    <div class = "statement">

    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/paymentreceived.js') }}"></script>
@endsection