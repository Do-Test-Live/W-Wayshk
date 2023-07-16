<?php
require_once("include/dbController.php");
$db_handle = new DBController();
$id = $_GET['id'];
$billing_details = $db_handle->runQuery("SELECT * FROM `billing_details` WHERE id = '$id'");
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <title>Invoice</title>
    <style>@import url(https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap);

        *, ::after, ::before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        b {
            font-weight: bolder
        }

        img {
            border-style: none
        }

        button {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0
        }

        button {
            overflow: visible
        }

        button {
            text-transform: none
        }

        button {
            -webkit-appearance: button
        }

        button::-moz-focus-inner {
            border-style: none;
            padding: 0
        }

        button:-moz-focusring {
            outline: 1px dotted ButtonText
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        body, html {
            color: #777;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5em;
            overflow-x: hidden;
            background-color: #f5f7ff
        }

        p, div {
            margin-top: 0;
            line-height: 1.5em
        }

        p {
            margin-bottom: 15px
        }

        img {
            border: 0;
            max-width: 100%;
            height: auto;
            vertical-align: middle
        }

        a {
            color: inherit;
            text-decoration: none;
            -webkit-transition: all .3s ease;
            transition: all .3s ease
        }

        a:hover {
            color: #2ad19d
        }

        button {
            color: inherit;
            -webkit-transition: all .3s ease;
            transition: all .3s ease
        }

        a:hover {
            text-decoration: none;
            color: inherit
        }

        table {
            width: 100%;
            caption-side: bottom;
            border-collapse: collapse
        }

        th {
            text-align: left
        }

        td {
            border-top: 1px solid #eaeaea
        }

        td, th {
            padding: 6px 10px;
            line-height: 1.55em
        }

        b {
            font-weight: bold
        }

        .cs-f16 {
            font-size: 16px
        }

        .cs-semi_bold {
            font-weight: 600
        }

        .cs-bold {
            font-weight: 700
        }

        .cs-m0 {
            margin: 0
        }

        .cs-mb0 {
            margin-bottom: 0
        }

        .cs-mb5 {
            margin-bottom: 5px
        }

        .cs-mb10 {
            margin-bottom: 10px
        }

        .cs-mb25 {
            margin-bottom: 25px
        }

        .cs-width_1 {
            width: 8.33333333%
        }

        .cs-width_2 {
            width: 16.66666667%
        }

        .cs-width_3 {
            width: 25%
        }

        .cs-width_4 {
            width: 33.33333333%
        }

        .cs-primary_color {
            color: #111
        }

        .cs-focus_bg {
            background: #f6f6f6
        }

        .cs-container {
            max-width: 880px;
            padding: 30px 15px;
            margin-left: auto;
            margin-right: auto
        }

        .cs-text_right {
            text-align: right
        }

        .cs-border_top_0 {
            border-top: 0
        }

        .cs-border_top {
            border-top: 1px solid #eaeaea
        }

        .cs-border_left {
            border-left: 1px solid #eaeaea
        }

        .cs-round_border {
            border: 1px solid #eaeaea;
            overflow: hidden;
            border-radius: 6px
        }

        .cs-border_none {
            border: none
        }

        .cs-invoice.cs-style1 {
            background: #fff;
            border-radius: 10px;
            padding: 50px
        }

        .cs-invoice.cs-style1 .cs-invoice_head {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between
        }

        .cs-invoice.cs-style1 .cs-invoice_head.cs-type1 {
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
            padding-bottom: 25px;
            border-bottom: 1px solid #eaeaea
        }

        .cs-invoice.cs-style1 .cs-invoice_footer {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex
        }

        .cs-invoice.cs-style1 .cs-invoice_footer table {
            margin-top: -1px
        }

        .cs-invoice.cs-style1 .cs-left_footer {
            width: 55%;
            padding: 10px 15px
        }

        .cs-invoice.cs-style1 .cs-right_footer {
            width: 46%
        }

        .cs-invoice.cs-style1 .cs-note {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            margin-top: 40px
        }

        .cs-invoice.cs-style1 .cs-note_left {
            margin-right: 10px;
            margin-top: 6px;
            margin-left: -5px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex
        }

        .cs-invoice.cs-style1 .cs-note_left svg {
            width: 32px
        }

        .cs-invoice.cs-style1 .cs-invoice_left {
            max-width: 55%
        }

        .cs-invoice_btns {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 30px
        }

        .cs-invoice_btns .cs-invoice_btn:first-child {
            border-radius: 5px 0 0 5px
        }

        .cs-invoice_btns .cs-invoice_btn:last-child {
            border-radius: 0 5px 5px 0
        }

        .cs-invoice_btn {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border: none;
            font-weight: 600;
            padding: 8px 20px;
            cursor: pointer
        }

        .cs-invoice_btn svg {
            width: 24px;
            margin-right: 5px
        }

        .cs-invoice_btn.cs-color1 {
            color: #111;
            background: rgb(255 205 26 / 48%) !important;
        }

        .cs-invoice_btn.cs-color1:hover {
            background-color: rgba(42, 209, 157, .3)
        }

        .cs-invoice_btn.cs-color2 {
            color: #fff;
            background: #ffcc18 !important;
        }

        .cs-invoice_btn.cs-color2:hover {
            background-color: rgba(42, 209, 157, .8)
        }

        .cs-table_responsive {
            overflow-x: auto
        }

        .cs-table_responsive > table {
            min-width: 600px
        }

        .cs-bar_list li:not(:last-child) {
            margin-bottom: 10px
        }

        .cs-table.cs-style2 tr:not(:first-child) {
            border-top: 1px dashed #eaeaea
        }

        .cs-list.cs-style1 li:not(:last-child) {
            border-bottom: 1px dashed #eaeaea
        }

        .cs-table.cs-style1 .cs-table.cs-style1 tr:not(:first-child) td {
            border-color: #eaeaea
        }

        @media (max-width: 767px) {
            .cs-mobile_hide {
                display: none
            }

            .cs-invoice.cs-style1 {
                padding: 30px 20px
            }

            .cs-invoice.cs-style1 .cs-right_footer {
                width: 100%
            }
        }

        @media (max-width: 500px) {
            .cs-invoice.cs-style1 .cs-logo {
                margin-bottom: 10px
            }

            .cs-invoice.cs-style1 .cs-invoice_head {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column
            }

            .cs-invoice.cs-style1 .cs-invoice_head.cs-type1 {
                -webkit-box-orient: vertical;
                -webkit-box-direction: reverse;
                -ms-flex-direction: column-reverse;
                flex-direction: column-reverse;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                text-align: center
            }

            .cs-invoice.cs-style1 .cs-invoice_head .cs-text_right {
                text-align: left
            }

            .cs-invoice.cs-style1 .cs-invoice_left {
                max-width: 100%
            }
        }</style>
    <script data-pagespeed-no-defer>//<![CDATA[
        (function () {
            function f(a, b, d) {
                if (a.addEventListener) a.addEventListener(b, d, !1); else if (a.attachEvent) a.attachEvent("on" + b, d); else {
                    var c = a["on" + b];
                    a["on" + b] = function () {
                        d.call(this);
                        c && c.call(this)
                    }
                }
            };window.pagespeed = window.pagespeed || {};
            var g = window.pagespeed;

            function k(a) {
                this.g = [];
                this.f = 0;
                this.h = !1;
                this.j = a;
                this.i = null;
                this.l = 0;
                this.b = !1;
                this.a = 0
            }

            function l(a, b) {
                var d = b.getAttribute("data-pagespeed-lazy-position");
                if (d) return parseInt(d, 0);
                var d = b.offsetTop, c = b.offsetParent;
                c && (d += l(a, c));
                d = Math.max(d, 0);
                b.setAttribute("data-pagespeed-lazy-position", d);
                return d
            }

            function m(a, b) {
                var d, c, e;
                if (!a.b && (0 == b.offsetHeight || 0 == b.offsetWidth)) return !1;
                a:if (b.currentStyle) c = b.currentStyle.position; else {
                    if (document.defaultView && document.defaultView.getComputedStyle && (c = document.defaultView.getComputedStyle(b, null))) {
                        c = c.getPropertyValue("position");
                        break a
                    }
                    c = b.style && b.style.position ? b.style.position : ""
                }
                if ("relative" == c) return !0;
                e = 0;
                "number" == typeof window.pageYOffset ? e = window.pageYOffset : document.body && document.body.scrollTop ? e = document.body.scrollTop : document.documentElement &&
                    document.documentElement.scrollTop && (e = document.documentElement.scrollTop);
                d = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
                c = e;
                e += d;
                var h = b.getBoundingClientRect();
                h ? (e = h.top - d, c = h.bottom) : (h = l(a, b), d = h + b.offsetHeight, e = h - e, c = d - c);
                return e <= a.f && 0 <= c + a.f
            }

            k.prototype.m = function (a) {
                p(a);
                var b = this;
                window.setTimeout(function () {
                    var d = a.getAttribute("data-pagespeed-lazy-src");
                    if (d) if ((b.h || m(b, a)) && -1 != a.src.indexOf(b.j)) {
                        var c = a.parentNode, e = a.nextSibling;
                        c && c.removeChild(a);
                        a.c && (a.getAttribute = a.c);
                        a.removeAttribute("onload");
                        a.tagName && "IMG" == a.tagName && g.CriticalImages && f(a, "load", function () {
                            g.CriticalImages.checkImageForCriticality(this);
                            b.b && (b.a--, b.a || g.CriticalImages.checkCriticalImages())
                        });
                        a.removeAttribute("data-pagespeed-lazy-src");
                        a.removeAttribute("data-pagespeed-lazy-replaced-functions");
                        c && c.insertBefore(a, e);
                        if (c = a.getAttribute("data-pagespeed-lazy-srcset")) a.srcset = c, a.removeAttribute("data-pagespeed-lazy-srcset");
                        a.src = d
                    } else b.g.push(a)
                }, 0)
            };
            k.prototype.loadIfVisibleAndMaybeBeacon = k.prototype.m;
            k.prototype.s = function () {
                this.h = !0;
                q(this)
            };
            k.prototype.loadAllImages = k.prototype.s;

            function q(a) {
                var b = a.g, d = b.length;
                a.g = [];
                for (var c = 0; c < d; ++c) a.m(b[c])
            }

            function t(a, b) {
                return a.a ? null != a.a(b) : null != a.getAttribute(b)
            }

            k.prototype.u = function () {
                for (var a = document.getElementsByTagName("img"), b = 0, d; d = a[b]; b++) t(d, "data-pagespeed-lazy-src") && p(d)
            };
            k.prototype.overrideAttributeFunctions = k.prototype.u;

            function p(a) {
                t(a, "data-pagespeed-lazy-replaced-functions") || (a.c = a.getAttribute, a.getAttribute = function (a) {
                    "src" == a.toLowerCase() && t(this, "data-pagespeed-lazy-src") && (a = "data-pagespeed-lazy-src");
                    return this.c(a)
                }, a.setAttribute("data-pagespeed-lazy-replaced-functions", "1"))
            }

            g.o = function (a, b) {
                function d() {
                    if (!(c.b && a || c.i)) {
                        var b = 200;
                        200 < (new Date).getTime() - c.l && (b = 0);
                        c.i = window.setTimeout(function () {
                            c.l = (new Date).getTime();
                            q(c);
                            c.i = null
                        }, b)
                    }
                }

                var c = new k(b);
                g.lazyLoadImages = c;
                f(window, "load", function () {
                    c.b = !0;
                    c.h = a;
                    c.f = 200;
                    if (g.CriticalImages) {
                        for (var b = 0, d = document.getElementsByTagName("img"), r = 0, n; n = d[r]; r++) -1 != n.src.indexOf(c.j) && t(n, "data-pagespeed-lazy-src") && b++;
                        c.a = b;
                        c.a || g.CriticalImages.checkCriticalImages()
                    }
                    q(c)
                });
                b.indexOf("data") && ((new Image).src = b);
                f(window,
                    "scroll", d);
                f(window, "resize", d)
            };
            g.lazyLoadInit = g.o;
        })();

        pagespeed.lazyLoadInit(true, "../../../pagespeed_static/1.JiBnMqyl6S.gif");

        //]]></script>
</head>
<body>
<div class="cs-container">
    <div class="cs-invoice cs-style1">
        <div class="cs-invoice_in" id="download_section">
            <div class="cs-invoice_head cs-type1 cs-mb25">
                <div class="cs-invoice_left">

                    <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">收帳單 / Invoice</p>
                    <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">發票號碼：</b> #WHK<?php echo $billing_details[0]['id']; ?></p>
                    <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">日期: </b>
                        <?php
                        $date = date_create($billing_details[0]["updated_at"]);
                        echo date_format($date, "d F Y");
                        ?>
                    </p>
                </div>
                <div class="cs-invoice_right cs-text_right">
                    <div class="cs-logo cs-mb5"><img src="../assets/images/logo/2.png" alt="Logo" style="width: 200px">
                    </div>
                </div>
            </div>
            <div class="cs-invoice_head cs-mb10">
                <div class="cs-invoice_left">
                    <b class="cs-primary_color">致：</b>
                    <p>
                        <?php echo $billing_details[0]['f_name'] . ' ' . $billing_details[0]['l_name']; ?><br>
                        機構名稱: <?php echo $billing_details[0]['organization_name']; ?><br>
                        <?php echo $billing_details[0]['address']; ?>,<br><?php echo $billing_details[0]['city']; ?>
                        ,<br>
                        <?php echo $billing_details[0]['zip_code']; ?>
                    </p>
                </div>
                <div class="cs-invoice_right cs-text_right">
                    <b class="cs-primary_color">支付給:</b>
                    <p>
                        Wayshk 活籽兒童用品店 <br>
                        大圍成運路 21-23 號群力工業大廈 3 樓 1 室 <br>
                        電話：5605 8389 / 電郵： wayshk.order@gmail.com
                    </p>
                </div>
            </div>
            <div class="cs-table cs-style1">
                <div class="cs-round_border">
                    <div class="cs-table_responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="font-size: 12px;">產品名稱</th>
                                <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg" style="font-size: 12px;">產品代碼</th>
                                <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg" style="font-size: 12px;">數量</th>
                                <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg" style="font-size: 12px;">價格</th>
                                <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right" style="font-size: 12px;">合計
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $invoice = $db_handle->runQuery("SELECT * FROM `invoice_details`,`product` WHERE billing_id = '$id' and invoice_details.product_id = product.id");
                            $no_invoice = $db_handle->numRows("SELECT * FROM `invoice_details`,`product` WHERE billing_id = '$id' and invoice_details.product_id = product.id");
                            for($i = 0; $i < $no_invoice; $i++){
                                ?>
                                <tr>
                                    <td class="cs-width_3"><?php echo $invoice[$i]['product_name'];?></td>
                                    <td class="cs-width_3"><?php echo $invoice[$i]['product_code'];?></td>
                                    <td class="cs-width_2"><?php echo $invoice[$i]['product_quantity'];?></td>
                                    <td class="cs-width_1"><?php echo $invoice[$i]['product_unit_price'];?></td>
                                    <td class="cs-width_2 cs-text_right"><?php echo $invoice[$i]['product_total_price'];?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cs-invoice_footer cs-border_top">
                        <div class="cs-left_footer cs-mobile_hide">
                            <p class="cs-mb0"><b class="cs-primary_color">郵寄方式:</b></p>
                            <p class="cs-m0"><?php echo $billing_details[0]['shipping_method'];?></p>
                            <p class="cs-mb0"><b class="cs-primary_color">付款方式:</b></p>
                            <p class="cs-m0"><?php echo $billing_details[0]['payment_type'];?></p>
                        </div>
                        <div class="cs-right_footer">
                            <table>
                                <tbody>
                                <tr class="cs-border_left">
                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">小計</td>
                                    <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                                        <?php echo $billing_details[0]['total_purchase'];?> HKD
                                    </td>
                                </tr>
                                <tr class="cs-border_left">
                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">運費</td>
                                    <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                                        <?php echo $billing_details[0]['delivery_charges'];?> HKD
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="cs-invoice_footer">
                    <div class="cs-left_footer cs-mobile_hide"></div>
                    <div class="cs-right_footer">
                        <table>
                            <tbody>
                            <tr class="cs-border_none">
                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">全部的</td>
                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">
                                   <?php echo $billing_details[0]['total_purchase'] + $billing_details[0]['delivery_charges'] ;?> HKD
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="cs-note">
                <div class="cs-note_left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z"
                              fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                        <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none"
                              stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                    </svg>
                </div>
                <div class="cs-note_right">
                    <p class="cs-mb0"><b class="cs-primary_color cs-bold">付款方式 ：</b></p>
                    <p class="cs-m0">1) 郵寄支票 ：支票抬頭請書明受款人為「 Wayshk」，信封請註明 Attn: Wayshk 並郵寄往大圍成運路 21-23 號群力工業大廈 3 樓 1 室</p>
                    <p class="cs-m0">2) 直接存款 ：銀行戶口號碼為 769-334699-883 （恆生銀行） 銀行戶口名稱: Wayshk</p>
                    <p class="cs-m0">3) Payme/轉數快：5265-7359</p>
                    <p class="cs-m0">4) 自取點以現金支付</p>
                    <p class="cs-m0">4) 自取點以現金支付</p>
                </div>
            </div>
        </div>
        <div class="cs-invoice_btns cs-hide_print">
            <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                          fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                    <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none"
                          stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                    <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                          stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                    <circle cx="392" cy="184" r="24"/>
                </svg>
                <span>Print</span>
            </a>
            <button id="download_btn" class="cs-invoice_btn cs-color2">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Download</title>
                    <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40"
                          fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="32"/>
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="32" d="M176 272l80 80 80-80M256 48v288"/>
                </svg>
                <span>Download</span>
            </button>
        </div>
    </div>
</div>
<script src="js/inv-1.js"></script>
<script>eval(mod_pagespeed_29hrpuHQrF);</script>
<script>eval(mod_pagespeed_otZnIY0lOn);</script>
<script src="js/inv-2.js"></script>
<script>//<![CDATA[
    (function ($) {
        'use strict';
        $('#download_btn').on('click', function () {
            var downloadSection = $('#download_section');
            var cWidth = downloadSection.width();
            var cHeight = downloadSection.height();
            var topLeftMargin = 40;
            var pdfWidth = cWidth + topLeftMargin * 2;
            var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
            var canvasImageWidth = cWidth;
            var canvasImageHeight = cHeight;
            var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;
            html2canvas(downloadSection[0], {allowTaint: true}).then(function (canvas) {
                canvas.getContext('2d');
                var imgData = canvas.toDataURL('image/jpeg', 1.0);
                var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
                pdf.addImage(imgData, 'JPG', topLeftMargin, topLeftMargin, canvasImageWidth, canvasImageHeight);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(pdfWidth, pdfHeight);
                    pdf.addImage(imgData, 'JPG', topLeftMargin, -(pdfHeight * i) + topLeftMargin * 0, canvasImageWidth, canvasImageHeight);
                }
                pdf.save('ivonne-invoice.pdf');
            });
        });
    })(jQuery);
    //]]></script>
<script data-pagespeed-no-defer>//<![CDATA[
    (function () {
        function f(b) {
            var a = window;
            if (a.addEventListener) a.addEventListener("load", b, !1); else if (a.attachEvent) a.attachEvent("onload", b); else {
                var c = a.onload;
                a.onload = function () {
                    b.call(this);
                    c && c.call(this)
                }
            }
        };window.pagespeed = window.pagespeed || {};
        var k = window.pagespeed;

        function l(b, a, c, g, h) {
            this.h = b;
            this.i = a;
            this.l = c;
            this.j = g;
            this.b = h;
            this.c = [];
            this.a = 0
        }

        l.prototype.f = function (b) {
            for (var a = 0; 250 > a && this.a < this.b.length; ++a, ++this.a) try {
                document.querySelector(this.b[this.a]) && this.c.push(this.b[this.a])
            } catch (c) {
            }
            this.a < this.b.length ? window.setTimeout(this.f.bind(this), 0, b) : b()
        };
        k.g = function (b, a, c, g, h) {
            if (document.querySelector && Function.prototype.bind) {
                var d = new l(b, a, c, g, h);
                f(function () {
                    window.setTimeout(function () {
                        d.f(function () {
                            for (var a = "oh=" + d.l + "&n=" + d.j, a = a + "&cs=", b = 0; b < d.c.length; ++b) {
                                var c = 0 < b ? "," : "", c = c + encodeURIComponent(d.c[b]);
                                if (131072 < a.length + c.length) break;
                                a += c
                            }
                            k.criticalCssBeaconData = a;
                            var b = d.h, c = d.i, e;
                            if (window.XMLHttpRequest) e = new XMLHttpRequest; else if (window.ActiveXObject) try {
                                e = new ActiveXObject("Msxml2.XMLHTTP")
                            } catch (m) {
                                try {
                                    e = new ActiveXObject("Microsoft.XMLHTTP")
                                } catch (n) {
                                }
                            }
                            e &&
                            (e.open("POST.html", b + (-1 == b.indexOf("?") ? "?" : "&") + "url=" + encodeURIComponent(c)), e.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), e.send(a))
                        })
                    }, 0)
                })
            }
        };
        k.criticalCssBeaconInit = k.g;
    })();
    pagespeed.selectors = ["*", ".cs-50_col > *", ".cs-accent_10_bg", ".cs-accent_bg", ".cs-accent_bg_hover", ".cs-accent_color", ".cs-accent_color_hover", ".cs-bar_list", ".cs-bar_list li", ".cs-bold", ".cs-border_bottom", ".cs-border_bottom_0", ".cs-border_left", ".cs-border_left_none", ".cs-border_less td", ".cs-border_none", ".cs-border_right", ".cs-border_right_none", ".cs-border_top", ".cs-border_top_0", ".cs-box.cs-style1", ".cs-box.cs-style1.cs-type1", ".cs-box.cs-style2", ".cs-box.cs-style2 .cs-table.cs-style2 td", ".cs-box2_wrap", ".cs-col_2", ".cs-col_3", ".cs-col_4", ".cs-container", ".cs-f10", ".cs-f11", ".cs-f12", ".cs-f13", ".cs-f14", ".cs-f15", ".cs-f16", ".cs-f17", ".cs-f18", ".cs-f19", ".cs-f20", ".cs-f21", ".cs-f22", ".cs-f23", ".cs-f24", ".cs-f25", ".cs-f26", ".cs-f27", ".cs-f28", ".cs-f29", ".cs-focus_bg", ".cs-grid_row", ".cs-heading.cs-style1", ".cs-invoice.cs-style1", ".cs-invoice.cs-style1 .cs-invoice_footer", ".cs-invoice.cs-style1 .cs-invoice_footer table", ".cs-invoice.cs-style1 .cs-invoice_head", ".cs-invoice.cs-style1 .cs-invoice_head .cs-text_right", ".cs-invoice.cs-style1 .cs-invoice_head.cs-type1", ".cs-invoice.cs-style1 .cs-invoice_left", ".cs-invoice.cs-style1 .cs-left_footer", ".cs-invoice.cs-style1 .cs-logo", ".cs-invoice.cs-style1 .cs-note", ".cs-invoice.cs-style1 .cs-note_left", ".cs-invoice.cs-style1 .cs-note_left svg", ".cs-invoice.cs-style1 .cs-right_footer", ".cs-invoice_btn", ".cs-invoice_btn svg", ".cs-invoice_btn.cs-color1", ".cs-invoice_btn.cs-color2", ".cs-invoice_btns", ".cs-invoice_btns .cs-invoice_btn", ".cs-left_auto", ".cs-light", ".cs-list.cs-style1", ".cs-list.cs-style1 li", ".cs-list.cs-style1 li > *", ".cs-list.cs-style2", ".cs-list.cs-style2 li", ".cs-list.cs-style2 li > *", ".cs-m0", ".cs-max_w_150", ".cs-mb0", ".cs-mb1", ".cs-mb10", ".cs-mb11", ".cs-mb12", ".cs-mb13", ".cs-mb14", ".cs-mb15", ".cs-mb16", ".cs-mb17", ".cs-mb18", ".cs-mb19", ".cs-mb2", ".cs-mb20", ".cs-mb21", ".cs-mb22", ".cs-mb23", ".cs-mb24", ".cs-mb25", ".cs-mb26", ".cs-mb27", ".cs-mb28", ".cs-mb29", ".cs-mb3", ".cs-mb30", ".cs-mb4", ".cs-mb5", ".cs-mb6", ".cs-mb7", ".cs-mb8", ".cs-mb9", ".cs-medium", ".cs-mobile_hide", ".cs-no_border", ".cs-normal", ".cs-primary_color", ".cs-pt25", ".cs-round_border", ".cs-secondary_color", ".cs-semi_bold", ".cs-special_item", ".cs-table.cs-style1 .cs-table.cs-style2 td", ".cs-table.cs-style1.cs-type1", ".cs-table.cs-style1.cs-type1 tr td", ".cs-table.cs-style1.cs-type2 .cs-table_title", ".cs-table.cs-style1.cs-type2 > *", ".cs-table.cs-style2 td", ".cs-table.cs-style2 th", ".cs-table_baseline", ".cs-table_responsive", ".cs-table_responsive > table", ".cs-ternary_color", ".cs-text_center", ".cs-text_right", ".cs-ticket_left", ".cs-ticket_right", ".cs-ticket_wrap", ".cs-title_1", ".cs-width_1", ".cs-width_10", ".cs-width_11", ".cs-width_12", ".cs-width_2", ".cs-width_3", ".cs-width_4", ".cs-width_5", ".cs-width_6", ".cs-width_7", ".cs-width_8", ".cs-width_9", "[hidden]", "[type=\"button\"]", "[type=\"checkbox\"]", "[type=\"number\"]", "[type=\"radio\"]", "[type=\"reset\"]", "[type=\"search\"]", "[type=\"submit\"]", "a", "abbr[title]", "address", "b", "blockquote", "body", "button", "cite", "code", "details", "dfn", "div", "dl", "dl dt", "em", "fieldset", "h1", "h2", "h3", "h4", "h5", "h6", "hr", "html", "i", "img", "input", "kbd", "legend", "main", "ol", "optgroup", "p", "pre", "progress", "samp", "select", "small", "strong", "sub", "summary", "sup", "table", "td", "template", "textarea", "th", "ul"];
    pagespeed.criticalCssBeaconInit('/mod_pagespeed_beacon', 'general-invoice.html', 'UMSeiHfgyf', 'kB01XgNLR_w', pagespeed.selectors);
    //]]></script>
<noscript class="psa_add_styles">
    <link rel="stylesheet" href="css/inv.css">
</noscript>
<script data-pagespeed-no-defer>//<![CDATA[
    (function () {
        function b() {
            var a = window, c = e;
            if (a.addEventListener) a.addEventListener("load", c, !1); else if (a.attachEvent) a.attachEvent("onload", c); else {
                var d = a.onload;
                a.onload = function () {
                    c.call(this);
                    d && d.call(this)
                }
            }
        };var f = !1;

        function e() {
            if (!f) {
                f = !0;
                for (var a = document.getElementsByClassName("psa_add_styles"), c = 0, d; d = a[c]; ++c) if ("NOSCRIPT" == d.nodeName) {
                    var k = document.createElement("div");
                    k.innerHTML = d.textContent;
                    document.body.appendChild(k)
                }
            }
        }

        function g() {
            var a = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || null;
            a ? a(function () {
                window.setTimeout(e, 0)
            }) : b()
        }

        var h = ["pagespeed", "CriticalCssLoader", "Run"], l = this;
        h[0] in l || !l.execScript || l.execScript("var " + h[0]);
        for (var m; h.length && (m = h.shift());) h.length || void 0 === g ? l[m] ? l = l[m] : l = l[m] = {} : l[m] = g;
    })();
    pagespeed.CriticalCssLoader.Run();
    //]]></script>
</body>

</html>