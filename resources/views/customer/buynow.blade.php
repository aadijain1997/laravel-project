@extends('customer.admin')

@section('content')

<div class="row">
    <div class=" col-sm-6 buynow1">
        <h2>Total Quantity -> {{$data}}</h2>
        <h2>Total Amount -> {{$sum}}</h2>
    </div>


    <div class="col-sm-6 buynowform1">
        <form >
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control cardname" required placeholder="Enter name">
                <span class="help-block name"></span>
            </div>

            <div class="form-group">
                <label>Address of Delivery</label>
                <input type="text" name="address" class="form-control cardaddress" required placeholder="Enter address">
                <span class="help-block address"></span>
            </div>

            <div class="form-group">
                <label>Card number</label>
                <input type="number" name="address" class="form-control cardnumber" placeholder="card number" >
                <span class="help-block number"></span>
            </div>

            <div class="row">
                <div class="col-sm-3 ">
                    <div class="form-group">
                        <label>Expiry month</label>
                        <input type="number" name="month" class="form-control cardmonth" placeholder="MM" maxlength="2" >
                        <span class="help-block month"></span>
                    </div>
                </div>


                <div class="col-sm-3 ">
                    <div class="form-group">
                        <label>Expiry year</label>
                        <input type="number" name="year" class="form-control cardyear" placeholder="YYYY" maxlength="4" >
                        <span class="help-block year"></span>
                    </div>
                </div>

                <div class="col-sm-3 ">
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="number" name="cvv" class="form-control cardcvv" placeholder="123" maxlength="3">
                        <span class="help-block cvv"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Name on card</label>
                <input type="text" name="cardname" class="form-control cardnamecard" placeholder="name of card" >
                <span class="help-block cardname"></span>
            </div>

            <button class="btn btn-primary cardd">submit</button>
        </form>
    </div>
</div>

@endsection