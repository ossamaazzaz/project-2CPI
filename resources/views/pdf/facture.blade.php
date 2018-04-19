<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Facture</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:last-child {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:last-child {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    #grandtotal {
       background: #eee;
    }
    
    hr {
    page-break-after: always;
    border: 0;
    }

    .page-number {
      text-align: center;
    }

    .page-number:before {
        content: "Page " counter(page);
    }
    </style>
</head>

<body>



    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <img src="http://i0.kym-cdn.com/photos/images/newsfeed/000/369/281/141.jpg" style="width:100%; max-width:300px;">
                            </td>
                            <td>
                                Shop Name<br>
                                Shop Website<br>
                                Address<br>
                                Phone Number
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            
                            <td>
                                Invoice #: 123<br>
                                Created: January 1, 2018<br>
                                Due: February 1, 2018
                            </td>

                            <td>
                                Client username<br>
                                Client name<br>
                                client@email.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table> 
        <table>
            <tr class="heading" style="text-align: center;">
                <td>
                    Command N°
                </td>

                <td style="text-align: center;">
                    Code
                </td>
            </tr>
            
            <tr class="item" style="text-align: center;">
                <td>
                    001
                </td>
                <td style="text-align: center;">
                    X75Z2
                </td>
                

            </tr>
      </table>
      <br>
      <table>      
            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Unit Price
                </td>

                <td>
                    Quantité
                </td>

                <td>
                    Price
                </td>

                <td style="text-align: center;">
                    Total
                </td>

                
                
            </tr>
            
            <tr class="item">
                <td>
                    Website design
                </td>
                
                <td>
                    $30.00
                </td>

                <td>
                    5
                </td>

                <td>
                    $300.00
                </td>

                <td style="text-align: center;">
                    $3000.00
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Hosting (3 months)
                </td>

                <td>
                    $30.00
                </td>

                <td>
                    5
                </td>

                <td>
                    $75.00
                </td>

                <td   style="text-align: center;">
                    $3100.00
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>
                <td>
                    $30.00
                </td>

                <td>
                    5
                </td>

                <td>
                    $10.00
                </td>

                <td   style="text-align: center;">
                    $3020.00
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td   style="text-align: center;">
                   Total: $385.00
                </td>
            </tr>
             <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style="text-align: center;">
                   TVA: 7%     
                </td>
            </tr>

            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td id="grandtotal" style="text-align: center;">
                   Grand Total: $420.00
                </td>
            </tr>

        </table>
        <div id="footer">
            <div class="page-number"></div>
        </div>
    </div>
    
    <hr>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <img src="http://i0.kym-cdn.com/photos/images/newsfeed/000/369/281/141.jpg" style="width:100%; max-width:300px;">
                            </td>
                            <td>
                                Shop Name<br>
                                Shop Website<br>
                                Address<br>
                                Phone Number
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            
                            <td>
                                Invoice #: 123<br>
                                Created: January 1, 2018<br>
                                Due: February 1, 2018
                            </td>

                            <td>
                                Client username<br>
                                Client name<br>
                                client@email.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table> 
        <table>
            <tr class="heading" style="text-align: center;">
                <td>
                    Command N°
                </td>

                <td style="text-align: center;">
                    Code
                </td>
            </tr>
            
            <tr class="item" style="text-align: center;">
                <td>
                    001
                </td>
                <td style="text-align: center;">
                    X75Z2
                </td>
                

            </tr>
      </table>
      <br>
      <table>      
            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Unit Price
                </td>

                <td>
                    Quantité
                </td>

                <td>
                    Price
                </td>

                <td style="text-align: center;">
                    Total
                </td>

                
                
            </tr>
            
            <tr class="item">
                <td>
                    Website design
                </td>
                
                <td>
                    $30.00
                </td>

                <td>
                    5
                </td>

                <td>
                    $300.00
                </td>

                <td style="text-align: center;">
                    $3000.00
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Hosting (3 months)
                </td>

                <td>
                    $30.00
                </td>

                <td>
                    5
                </td>

                <td>
                    $75.00
                </td>

                <td   style="text-align: center;">
                    $3100.00
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>
                <td>
                    $30.00
                </td>

                <td>
                    5
                </td>

                <td>
                    $10.00
                </td>

                <td   style="text-align: center;">
                    $3020.00
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td   style="text-align: center;">
                   Total: $385.00
                </td>
            </tr>
             <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td  style="text-align: center;">
                   TVA: 7%     
                </td>
            </tr>

            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td id="grandtotal" style="text-align: center;">
                   Grand Total: $420.00
                </td>
            </tr>

        </table>
        <div id="footer">
            <div class="page-number"></div>
        </div>
    </div>
</body>
</html>
