<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Facture</title>
    
    <style>
    .invoice-box {
        /*max-width: 800px;*/
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

    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="top">
                    <table>
                        <tr>
                            <td>
                                <img src="" style="width:100%; max-width:200px;">
                            </td>
                            <td>
                                Shop Name<br>
                                Shop Website<br>
                                Address<br>
                                Phone Number
                            </td>
                            
                        </tr>
                    </table> 
        </div>
        <br><br>
        <div class="information">
                <table>
                        <tr>
                            
                            <td>
                                Facture #: {{$order->id}}<br>
                                Date de commande: {{$order->created_at}}<br>
                                Délai: 48 heures
                            </td>

                            <td>
                                {{$order->user->username}} <br>
                                {{$order->user->firstName . ' '. $order->user->lastName}}<br>
                                {{$order->user->email}}
                            </td>
                        </tr>
                    </table>
               </div>
        </table> 
        <table>
            <tr class="heading" style="text-align: center;">
                <td>
                    Commande N°
                </td>

                <td style="text-align: center;">
                    Code
                </td>
            </tr>
            
            <tr class="item" style="text-align: center;">
                <td>
                    {{$order->id}}
                </td>
                <td style="text-align: center;">
                    {{$order->code}}
                </td>
                

            </tr>
      </table>
      <br><br>
      <table>      
            <tr class="heading">
                <td>
                    Produit
                </td>

                <td>
                    Marque
                </td>

                <td>
                    Prix Unitaire
                </td>

                <td>
                    Quantité
                </td>

                

                <td style="text-align: center;">
                    Prix Total
                </td>

                
                
            </tr>
            <?php 
            $i = 0;
            $len = count($order->orderItems);
            ?>
            @foreach ($order->orderItems as $Item)
            
            <tr 
            @if($i == $len - 1 )
            class="item last"
            @else
            class="item"
            @endif>
                <td>
                    {{ $Item->product->name }}
                </td>

                <td>
                    {{ $Item->product->brand }}
                </td>
                
                <td>
                    {{ $Item->product->price }}
                </td>

                <td>
                    {{ $Item->quantity}}
                </td>

                

                <td style="text-align: center;">
                    {{ $Item->quantity * $Item->product->price}}
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
            
            

            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td   style="text-align: center;">
                   Total: {{ $order->total_paid }}
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
                   Grand Total: {{ $order->total_paid + ($order->total_paid * 7 / 100)}}
                </td>
            </tr>

        </table>
     <i style="font-size: 9px;" >* Veuillez attender la confirmation de votre demande.</i>
    </div>
    <!--<hr> End of Page-->
</body>
</html>
