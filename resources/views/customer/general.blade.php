
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>General Purpose Invoice-5</title>
  <link rel="stylesheet" href="../customer/invoice/assets/css/style.css">
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1 tm_radius_0" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_flex tm_flex_column_sm tm_justify_between tm_align_center tm_align_start_sm tm_f14 tm_primary_color tm_medium tm_mb5">
            <p class="tm_m0 tm_f18 tm_bold">Invoice</p>
            <p class="tm_m0">Invoice Date: {{ $order->first()->date }}</p>
            <p class="tm_m0">Invoice No: AP{{ $order->first()->invoice_number }}</p>
          </div>
          <div class="tm_grid_row tm_col_4 tm_padd_20 tm_accent_bg tm_mb25 tm_white_color tm_align_center">
            <div>
              <div class="tm_logo"><img src="../customer/assets/img/logo3.png" alt="Logo"></div>
            </div>
            <div style="color: #451514">
                +92-322-4963358<br>
                info@adorepal.com
            </div>
            <div style="color: #451514">
                Main Ghazi Road,<br>
                Lahore, Pakistan
            </div>
            <div style="color: #451514">
                Visit Our site: <a href="www.adorepal.com">www.adorepal.com</a>
            </div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Bill To:</b></p>
              <p>
                 {{ $order->first()->address }}
                <br>{{ $order->first()->customer_email }}<br>
              </p>
            </div>
            <div class="tm_invoice_right tm_text_center">
              <p class="tm_mb3"><b class="tm_primary_color">Amount Due</b></p>
              <div class="tm_f30 tm_bold tm_accent_color tm_padd_15 tm_accent_bg_10 tm_border_1 tm_accent_border_20 tm_mb5">
                Rs. {{ $order->first()->total_price }}
              </div>
              <p class="tm_mb0"><i>Payment method: {{ $order->first()->payment_method }}</i></p>
            </div>
          </div>
          <div class="tm_table tm_style1 tm_mb40">
            <div class="tm_round_border tm_radius_0">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr>
                      <th class="tm_width_3 tm_semi_bold tm_primary_color">{{ "#ID" }}</th>
                      <th class="tm_width_4 tm_semi_bold tm_primary_color tm_border_left">Product Name</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_border_left">Product Price</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_border_left">Product Qty</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_border_left tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $data)

                    <tr>
                      <td class="tm_width_3">{{ $data->product_id }}</td>
                      <td class="tm_width_4 tm_border_left">{{ $data->product_name }}</td>
                      <td class="tm_width_2 tm_border_left">Rs. {{ $data->product_price }}</td>
                      <td class="tm_width_1 tm_border_left">{{ $data->product_qty }}</td>
                      <td class="tm_width_2 tm_border_left tm_text_right">Rs. {{ $data->product_price* $data->product_qty }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer">
              <div class="tm_left_footer tm_mobile_hide">
              </div>
              <div class="tm_right_footer">
                <table>
                  <tbody>
                    <tr>
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">Rs. {{ $order->first()->total_price }}</td>
                    </tr>
                    <tr>
                      <td class="tm_width_3 tm_primary_color">Tax <span class="tm_ternary_color"></span></td>
                      <td class="tm_width_3 tm_primary_color tm_text_right">+Rs. 0.00</td>
                    </tr>
                    <tr class="tm_border_bottom tm_accent_bg_10">
                      <td class="tm_width_3 tm_bold tm_f16 tm_accent_color">Grand Total	</td>
                      <td class="tm_width_3 tm_bold tm_f16 tm_accent_color tm_text_right">Rs.{{ $order->first()->total_price }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <p class="tm_bold tm_primary_color tm_m0">Terms and conditions</p>
          <p class="tm_m0">Delivery dates are not guaranteed and Seller has no liability for damages that may be incurred due to any delay in shipment of goods hereunder. Taxes are excluded unless otherwise stated.</p>
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="../customer/invoice/assets/js/jquery.min.js"></script>
  <script src="../customer/invoice/assets/js/jspdf.min.js"></script>
  <script src="../customer/invoice/assets/js/html2canvas.min.js"></script>
  <script src="../customer/invoice/assets/js/main.js"></script>
</body>
</html>
