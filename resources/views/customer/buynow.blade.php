@extends('customer.admin')

@section('content')

<div class="row">
    <div class=" col-sm-6 buynow1">
        <h2>Total Quantity -> {{$data}}</h2>
        <h2>Total Amount -> {{$sum}}</h2>
    </div>


    <div class="col-sm-6 buynowform1">
        <form class="buynow">
            <div class="form-group buyname">
                <label>Name</label>
                <input type="text" name="nname" class="form-control cardname" required placeholder="Enter name">
                <span class="help-block name"></span>
            </div>

            <div class="form-group buyadd">
                <label>Address of Delivery</label>
                <input type="text" name="address" class="form-control cardaddress" required placeholder="Enter address">
                <span class="help-block address"></span>
            </div>

            <div class="form-group buycard">
                <label>Card number</label>
                <input type="number" name="cardnum" class="form-control cardnumber" placeholder="card number" >
                <span class="help-block number"></span>
            </div>

            <div class="row">
                <div class="col-sm-3 ">
                    <div class="form-group buymon">
                        <label>Expiry month</label>
                        <select name="month" class="form-control cardmonth" placeholder="MM" size="1">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> 
                        <span class="help-block month"></span>
                    </div>
                </div>


                <div class="col-sm-3 buyyear">
                    <div class="form-group">
                        <label>Expiry year</label>
                        <select name="year" class="form-control cardyear" placeholder="YYYY"size="1">
                            <option value="2010">2030</option>
                            <option value="2011">2031</option>
                            <option value="2012">2032</option>
                            <option value="2013">2033</option>
                            <option value="2014">2034</option>
                            <option value="2015">2035</option>
                        </select>
                        <span class="help-block year"></span>
                    </div>
                </div>

                <div class="col-sm-3 buycvv">
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="number" name="cvv" class="form-control cardcvv" placeholder="123" min="0" max="3"/>
                        <span class="help-block cvv"></span>
                    </div>
                </div>
            </div>

            <div class="form-group buycardd">
                <label>Name on card</label>
                <input type="text" name="cardname" class="form-control cardnamecard" placeholder="name of card" >
                <span class="help-block cardname"></span>
            </div>

            <button type="button" class="btn btn-primary cardd" onclick="buy();">submit</button>
        </form>
    </div>
</div>

@endsection