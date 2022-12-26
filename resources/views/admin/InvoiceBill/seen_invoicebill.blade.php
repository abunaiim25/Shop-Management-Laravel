<html>

<head>
    <meta charset="utf-8">
    <title>{{$invoice->name}}-Invoice</title>
    <link rel="stylesheet" href="style.css">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
</head>

<body>
    @php
    $front = App\Models\FrontControl::first();
    @endphp

    <div class="body">
        <header>
            <h1>Invoice</h1>
            <h2 style=" display:flex; justify-content:center; text-transform:uppercase; font-weight: bold;
            margin-bottom:5px">
                Shopno
                Enterprise</h2>
            <p style="display:flex; justify-content:center; font-size:12px;">
                Address: {{$front->footer_contact_address}}
            </p>
            <p style="display:flex; justify-content:center; font-size:12px;">
                Service Hot Line: {{$front->footer_contact_phone}}</p>
            <p style="display:flex; justify-content:center; font-size:12px;">Email: {{$front->footer_contact_email}}
            </p>

        </header>

        <article>
            <div style="display:flex; justify-content:space-between">

                <table class=" meta">
                    <tr>
                        <th>
                            Customer Name</span>
                        </th>
                        <td>{{$invoice->name}}</td>
                    </tr>
                    <tr>
                        <th><span>Customer Person</span></th>
                        <td>{{$invoice->person}}</td>
                    </tr>
                    <tr>
                        <th><span>Customer Email</span></th>
                        <td>{{$invoice->email}}</td>
                    </tr>
                    <tr>
                        <th><span>Customer Number</span></th>
                        <td>{{$invoice->phone}}</td>
                    </tr>
                    <tr>
                        <th><span>Customer Address</span></th>
                        <td>
                            {{$invoice->address}}
                        </td>
                    </tr>
                </table>

                <table class="meta">
                    <tr>
                        <th>Date</th>
                        <td> {{$invoice->date}}</td>
                    </tr>
                    <tr>
                        <th>Invoice / Bill No</th>
                        <td>{{$invoice->invoice_no}}</td>
                    </tr>
                    <tr>
                        <th>Ref By</th>
                        <td> {{$invoice->ref_by}}</td>
                    </tr>
                    <tr>
                        <th>Sold By</th>
                        <td> {{$invoice->sold_by}}</td>
                    </tr>

                </table>
            </div>

            <table class="inventory">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Product Description</th>
                        <th>Warranty</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $item->product_desc }}</td>
                        <td>{{ $item->warranty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->product_qty }}</td>
                        <td>{{ $item->product_qty *  $item->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <div style='float:right'>
                <p style='font-size:15px; font-weight:bold'>Grand Total: {{$invoice->subtotal}}TK</p>
            </div>

            <table class="balance">
                <tr>
                    <th>Previous Due</th>
                    <td>{{$invoice->previous_due}} TK</td>
                </tr>
                <tr>
                    <th>Selling Amount</th>
                    <td>{{$invoice->subtotal}} TK</td>
                </tr>
                <tr>
                    <th>Collecton</th>
                    <td>{{$invoice->collecton}} TK</td>
                </tr>
                <tr>
                    <th>Net Oustanding</th>
                    <td>{{$invoice->previous_due + $invoice->subtotal - $invoice->collecton}} TK</td>
                </tr>
            </table>
        </article>



        <div class="sig" style="display:flex; justify-content:space-between; margin-bottom:30px">
            <div class="reciver">
                <p>...............................</p>
                <p>Receiver Signature</p>
            </div>
            <div class="manager">
                <p>...............................</p>
                <p>Manager Signature</p>
            </div>
        </div>

        <aside>
            <h1><span>Additional Notes</span></h1>
            <div>
                <p style='font-size:12px'>পণ্যের কোন অংশ যদি পুড়ে যায়, ভেঙ্গে যায়, কোন অংশ বসে
                    যায়,
                    টেম্পারিং হয়, মরিচা পড়ে, বাঁকা হয়ে
                    যায়, ফাঙ্গাশ পড়ে, পণ্যের ওয়ারেন্টি স্টিকার বা সিরিয়াল নাম্বার উঠে যায় বা অস্পষ্ট
                    অবস্থায়
                    পাওয়া
                    যায় সেক্ষেত্রে তা ওয়ারেন্টির আওতায় আসবে না।</p>
                <p style='font-size:12px; margin-top:5px'>If any part of the product is burnt, broken, any
                    part
                    is
                    sitting,
                    tampering,
                    rusting, bending, fungi, warranty sticker or serial number of the product is removed or
                    found in
                    unclear condition, it will not come under warranty.</p>
            </div>
        </aside>

        <div style="display:flex; justify-content:center; margin-bottom:20px; margin-top: 10px;">
            <div
                style="height:30px; width:150px; background:#000; display:flex; justify-content:center; align-items:center">
                <a style="color:#FFF; " href="javascript:window.print()"> Print or Download</a>
            </div>
        </div>
    </div>






</body>

</html>

<!--CSS-->
<style>
* {
    border: 0;
    box-sizing: content-box;
    color: inherit;
    font-family: inherit;
    font-size: inherit;
    font-style: inherit;
    font-weight: inherit;
    line-height: inherit;
    list-style: none;
    margin: 0;
    padding: 0;
    text-decoration: none;
    vertical-align: top;
}

/* content editable */


h1 {
    font: bold 100% sans-serif;
    letter-spacing: 0.5em;
    text-align: center;
    text-transform: uppercase;
}

/* table */

table {
    font-size: 75%;
    table-layout: fixed;
    width: 100%;
}

table {
    border-collapse: separate;
    border-spacing: 2px;
}

th,
td {
    border-width: 1px;
    padding: 0.5em;
    position: relative;
    text-align: left;
}

th,
td {
    border-radius: 0.25em;
    border-style: solid;
}

th {
    background: #EEE;
    border-color: #BBB;
}

td {
    border-color: #DDD;
}

/* page */

html {
    font: 16px/1 ' Open Sans', sans-serif;
    overflow: auto;
    padding: 0.5in;
}

html {
    background: #999;
    cursor: default;
}

.body {
    box-sizing: border-box;
    margin: 0 auto;
    overflow: hidden;
    padding: 0.5in;
    width:
        8.5in;
}

.body {
    background: #FFF !important;
    border-radius: 1px;
    box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
}

/* header */
header {
    margin: 0 0 3em;
}

header:after {
    clear: both;
    content: "";
    display: table;
}

header h1 {
    background: #000;
    border-radius: 0.25em;
    color: #FFF;
    margin: 0 0 1em;
    padding: 0.5em 0;
}

/* article */
article,
article address,
table.meta {
    margin: 0 0 3em;
}

table.inventory {
    margin-bottom: 1rem;
}


article:after {
    clear: both;
    content: "";
    display: table;
}

article h1 {
    clip: rect(0 0 0 0);
    position: absolute;
}

/*
                article address { float: left; font-size: 125%; font-weight: bold; }*/
/* table meta & balance */
table.meta {
    width: 45%;
}

table.balance {
    width: 45%;
}

table.meta:after,
table.balance:after {
    clear:
        both;
    content: "";
    display: table;
}

/* table meta */
table.meta th {
    width: 40%;
}

table.meta td {
    width: 60%;
}

/* table items */
table.inventory {
    clear: both;
    width: 100%;
}

table.inventory th {
    font-weight: bold;
    text-align: center;
}

table.inventory th:nth-child(1) {
    width: 4%;
}

table.inventory th:nth-child(2) {
    width: 56% !important;
}

table.inventory th:nth-child(3) {
    text-align: right;
    width:
        10%;
}

table.inventory th:nth-child(4) {
    text-align: right;
    width: 10%;
}

table.inventory th:nth-child(5) {
    text-align: right;
    width: 10%;
}

table.inventory th:nth-child(6) {
    text-align: right;
    width: 10%;
}

table.inventory td:nth-child(1) {
    width: 6%;
}

table.inventory td:nth-child(2) {
    width:
        38% !important;
}

table.inventory td:nth-child(3) {
    text-align: right;
    width: 9%;
}

table.inventory td:nth-child(4) {
    text-align: right;
    width: 9%;
}

table.inventory td:nth-child(5) {
    text-align: right;
    width: 9%;
}

table.inventory td:nth-child(6) {
    text-align: right;
    width: 9%;
}

/* table balance */
table.balance th,
table.balance td {
    width: 50%;
}

table.balance td {
    text-align: right;
}

/* aside */
aside h1 {
    border: none;
    border-width: 0 0 1px;
    margin: 0 0 1em;
}

aside h1 {
    border-color: #999;
    border-bottom-style: solid;
}

/* javascript */
.add,
.cut {
    border-width: 1px;
    display: block;
    font-size: .8rem;
    padding: 0.25em 0.5em;
    float: left;
    text-align: center;
    width: 0.6em;
}

.add,
.cut {
    background: #9AF;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    background-image:
        -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
    background-image: -webkit-linear-gradient(#00ADEE 5%,
            #0078A5 100%);
    border-radius: 0.5em;
    border-color: #0076A3;
    color: #FFF;
    cursor: pointer;
    font-weight:
        bold;
    text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
}

.add {
    margin: -2.5em 0 0;
}

.add:hover {
    background: #00ADEE;
}

.cut {
    opacity: 0;
    position: absolute;
    top: 0;
    left: -1.5em;
}

.cut {
    -webkit-transition: opacity 100ms ease-in;
}

tr:hover .cut {
    opacity: 1;
}

@media print {
    * {
        -webkit-print-color-adjust: exact;
    }

    html {
        background: none;
        padding: 0;
    }

    body {
        box-shadow: none;
        margin: 0;
    }

    span:empty {
        display: none;
    }

    .add,
    .cut {
        display: none;
    }
}

@page {
    margin: 0;
}
</style>