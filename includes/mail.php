<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

// echo '<body style="text-color:#000">
// <h2 style="font-size:50px;text-align:center;font-weight: 200;
// border-bottom: 1px;
// border-style: none none solid none;
// border-image: linear-gradient(90deg, #0f9, #019f9f) 1;font-color:#000;text-color:#000">You\'ve been invited to join us at yuea.my.to!</h2>
// <p style="font-size:25px;font-famil:sans-serif;text-align:center;font-color:#000;text-color:#000">All you have to do is click this button and you can partake in the adventure that is yuea, where amazing things happen.</p>
// <a href="join.php?inv=$code">
// 	<button type="button" name="button" style="align-self: center;
// 	width: 170px;
// 	height: 70px;
// 	margin-top: 15%;
// 	margin-left: calc(50% - (170px/2));
// 	border-width: 3px;
// 	border-style: solid;
// 	border-image: repeating-linear-gradient(45deg, #0f9 10px, #0f9 25px, #019f9f 35px, #019f9f 50px, #0f9 60px) 1;
// 	font-size: 350%;
// 	background-color: #fff;" hover="background-color: darkgray;">Join</button>
// </a>
// </body>';
/**
 *
 */
class mail
{

	public static function send($i, $email, $code)
	{
		$sub = "";
		$bod = "";
		$altBod = "";

		$inviteEmail = '<!doctype html><html ⚡4email data-css-strict><head><meta charset="utf-8"><style amp4email-boilerplate>body{visibility:hidden}</style><script async src="https://cdn.ampproject.org/v0.js"></script><style amp-custom>.es-desk-hidden {	display:none;	float:left;	overflow:hidden;	width:0;	max-height:0;	line-height:0;}s {	text-decoration:line-through;}body {	width:100%;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;}table {	border-collapse:collapse;	border-spacing:0px;}table td, html, body, .es-wrapper {	padding:0;	Margin:0;}.es-content, .es-header, .es-footer {	table-layout:fixed;	width:100%;}p, hr {	Margin:0;}h1, h2, h3, h4, h5 {	Margin:0;	line-height:120%;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;}.es-left {	float:left;}.es-right {	float:right;}.es-p5 {	padding:5px;}.es-p5t {	padding-top:5px;}.es-p5b {	padding-bottom:5px;}.es-p5l {	padding-left:5px;}.es-p5r {	padding-right:5px;}.es-p10 {	padding:10px;}.es-p10t {	padding-top:10px;}.es-p10b {	padding-bottom:10px;}.es-p10l {	padding-left:10px;}.es-p10r {	padding-right:10px;}.es-p15 {	padding:15px;}.es-p15t {	padding-top:15px;}.es-p15b {	padding-bottom:15px;}.es-p15l {	padding-left:15px;}.es-p15r {	padding-right:15px;}.es-p20 {	padding:20px;}.es-p20t {	padding-top:20px;}.es-p20b {	padding-bottom:20px;}.es-p20l {	padding-left:20px;}.es-p20r {	padding-right:20px;}.es-p25 {	padding:25px;}.es-p25t {	padding-top:25px;}.es-p25b {	padding-bottom:25px;}.es-p25l {	padding-left:25px;}.es-p25r {	padding-right:25px;}.es-p30 {	padding:30px;}.es-p30t {	padding-top:30px;}.es-p30b {	padding-bottom:30px;}.es-p30l {	padding-left:30px;}.es-p30r {	padding-right:30px;}.es-p35 {	padding:35px;}.es-p35t {	padding-top:35px;}.es-p35b {	padding-bottom:35px;}.es-p35l {	padding-left:35px;}.es-p35r {	padding-right:35px;}.es-p40 {	padding:40px;}.es-p40t {	padding-top:40px;}.es-p40b {	padding-bottom:40px;}.es-p40l {	padding-left:40px;}.es-p40r {	padding-right:40px;}.es-menu td {	border:0;}a {	text-decoration:none;}p, ul li, ol li {	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;	line-height:150%;}ul li, ol li {	Margin-bottom:15px;}.es-menu td a {	text-decoration:none;	display:block;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;}.es-menu amp-img, .es-button amp-img {	vertical-align:middle;}.es-wrapper {	width:100%;	height:100%;}.es-wrapper-color {	background-color:#F6F6F6;}.es-header {	background-color:#3D4C6B;}.es-header-body {	background-color:#3D4C6B;}.es-header-body p, .es-header-body ul li, .es-header-body ol li {	color:#B7BDC9;	font-size:16px;}.es-header-body a {	color:#B7BDC9;	font-size:16px;}.es-content-body {	background-color:#F6F6F6;}.es-content-body p, .es-content-body ul li, .es-content-body ol li {	color:#999999;	font-size:16px;}.es-content-body a {	color:#75B6C9;	font-size:16px;}.es-footer {	background-color:transparent;}.es-footer-body {	background-color:transparent;}.es-footer-body p, .es-footer-body ul li, .es-footer-body ol li {	color:#999999;	font-size:14px;}.es-footer-body a {	color:#999999;	font-size:14px;}.es-infoblock, .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li {	line-height:120%;	font-size:12px;	color:#CCCCCC;}.es-infoblock a {	font-size:12px;	color:#CCCCCC;}h1 {	font-size:40px;	font-style:normal;	font-weight:bold;	color:#444444;}h2 {	font-size:28px;	font-style:normal;	font-weight:normal;	color:#444444;}h3 {	font-size:18px;	font-style:normal;	font-weight:normal;	color:#444444;}.es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a {	font-size:40px;}.es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a {	font-size:28px;}.es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a {	font-size:18px;}a.es-button, button.es-button {	border-style:solid;	border-color:#75B6C9;	border-width:15px 25px 15px 25px;	display:inline-block;	background:#75B6C9;	border-radius:28px;	font-size:18px;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;	font-weight:normal;	font-style:normal;	line-height:120%;	color:#FFFFFF;	text-decoration:none;	width:auto;	text-align:center;}.es-button-border {	border-style:solid solid solid solid;	border-color:#75B6C9 #75B6C9 #75B6C9 #75B6C9;	background:#75B6C9;	border-width:1px 1px 1px 1px;	display:inline-block;	border-radius:28px;	width:auto;}@media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150% } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:30px; text-align:center } h2 { font-size:26px; text-align:center } h3 { font-size:20px; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px } .es-menu td a { font-size:16px } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px } *[class="gmail-fix"] { display:none } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left } .es-m-txt-r amp-img { float:right } .es-m-txt-c amp-img { margin:0 auto } .es-m-txt-l amp-img { float:left } .es-button-border { display:block } a.es-button, button.es-button { font-size:20px; display:block; border-width:15px 25px 15px 25px } .es-btn-fw { border-width:10px 0px; text-align:center } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100% } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%; max-width:600px } .es-adapt-td { display:block; width:100% } .adapt-img { width:100%; height:auto } td.es-m-p0 { padding:0px } td.es-m-p0r { padding-right:0px } td.es-m-p0l { padding-left:0px } td.es-m-p0t { padding-top:0px } td.es-m-p0b { padding-bottom:0 } td.es-m-p20b { padding-bottom:20px } .es-mobile-hidden, .es-hidden { display:none } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto; overflow:visible; float:none; max-height:inherit; line-height:inherit } tr.es-desk-hidden { display:table-row } table.es-desk-hidden { display:table } td.es-desk-menu-hidden { display:table-cell } .es-menu td { width:1% } table.es-table-not-adapt, .esd-block-html table { width:auto } table.es-social { display:inline-block } table.es-social td { display:inline-block } }</style></head> <body><div class="es-wrapper-color"> <!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"> <v:fill type="tile" color="#f6f6f6"></v:fill> </v:background><![endif]--><table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"><tr><td valign="top"><table cellpadding="0" cellspacing="0" class="es-header" align="center"><tr><td align="center"><table bgcolor="#3d4c6b" class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="640"><tr><td class="es-p20t es-p20r es-p20l" align="left"><table width="100%" cellspacing="0" cellpadding="0"><tr><td width="600" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" role="presentation"><tr><td class="es-p25t es-p10b" align="center"><h2 style="font-size: 40px;color: #ffffff">You\'ve Been&nbsp;Invited!</h2></td></tr></table></td></tr></table></td></tr></table></td> </tr></table><table class="es-content" cellspacing="0" cellpadding="0" align="center"><tr><td style="background-color: #3d4c6b;background-size: cover" bgcolor="#3d4c6b" align="center"><table class="es-content-body" style="background-color: transparent" width="640" cellspacing="0" cellpadding="0" bgcolor="rgba(0, 0, 0, 0)" align="center"><tr><td class="es-p20t es-p15b es-p20r es-p20l" align="left"><table width="100%" cellspacing="0" cellpadding="0"><tr><td width="600" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" role="presentation"><tr><td class="es-p15t es-p20b" align="center"><p style="color: #b7bdc9;font-family: \'open sans\', \'helvetica neue\', helvetica, arial, sans-serif">All you have to do is click this button and you can partake in the adventure that is yuea, where amazing things happen.</p></td> </tr><tr><td class="es-p5t es-p40b" align="center"><span class="es-button-border" style="border-radius: 0px;background: #6ef961"><a href="https://yuea.my.to/tutorials/videobox/join.php?inv='.$code.'" class="es-button es-button-1" target="_blank" style="color: #ffffff;background: #6ef961;border-color: #6ef961;border-radius: 0px;border-width: 15px 50px">Join Now</a></span></td></tr></table></td></tr></table></td></tr><tr><td class="es-p20t es-p20r es-p20l" align="left"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="600" align="center" valign="top"><table cellpadding="0" cellspacing="0" width="100%" role="presentation"><tr><td align="left"><p>If the above button does not work, use this link<br><br>https://www.yuea.my.to/tutorials/videobox/join.php?inv='.$code.'</p></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></div></body></html>';
		$verificationEmail = '<!doctype html><html ⚡4email data-css-strict><head><meta charset="utf-8"><style amp4email-boilerplate>body{visibility:hidden}</style><script async src="https://cdn.ampproject.org/v0.js"></script><style amp-custom>.es-desk-hidden {	display:none;	float:left;	overflow:hidden;	width:0;	max-height:0;	line-height:0;}s {	text-decoration:line-through;}body {	width:100%;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;}table {	border-collapse:collapse;	border-spacing:0px;}table td, html, body, .es-wrapper {	padding:0;	Margin:0;}.es-content, .es-header, .es-footer {	table-layout:fixed;	width:100%;}p, hr {	Margin:0;}h1, h2, h3, h4, h5 {	Margin:0;	line-height:120%;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;}.es-left {	float:left;}.es-right {	float:right;}.es-p5 {	padding:5px;}.es-p5t {	padding-top:5px;}.es-p5b {	padding-bottom:5px;}.es-p5l {	padding-left:5px;}.es-p5r {	padding-right:5px;}.es-p10 {	padding:10px;}.es-p10t {	padding-top:10px;}.es-p10b {	padding-bottom:10px;}.es-p10l {	padding-left:10px;}.es-p10r {	padding-right:10px;}.es-p15 {	padding:15px;}.es-p15t {	padding-top:15px;}.es-p15b {	padding-bottom:15px;}.es-p15l {	padding-left:15px;}.es-p15r {	padding-right:15px;}.es-p20 {	padding:20px;}.es-p20t {	padding-top:20px;}.es-p20b {	padding-bottom:20px;}.es-p20l {	padding-left:20px;}.es-p20r {	padding-right:20px;}.es-p25 {	padding:25px;}.es-p25t {	padding-top:25px;}.es-p25b {	padding-bottom:25px;}.es-p25l {	padding-left:25px;}.es-p25r {	padding-right:25px;}.es-p30 {	padding:30px;}.es-p30t {	padding-top:30px;}.es-p30b {	padding-bottom:30px;}.es-p30l {	padding-left:30px;}.es-p30r {	padding-right:30px;}.es-p35 {	padding:35px;}.es-p35t {	padding-top:35px;}.es-p35b {	padding-bottom:35px;}.es-p35l {	padding-left:35px;}.es-p35r {	padding-right:35px;}.es-p40 {	padding:40px;}.es-p40t {	padding-top:40px;}.es-p40b {	padding-bottom:40px;}.es-p40l {	padding-left:40px;}.es-p40r {	padding-right:40px;}.es-menu td {	border:0;}a {	text-decoration:none;}p, ul li, ol li {	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;	line-height:150%;}ul li, ol li {	Margin-bottom:15px;}.es-menu td a {	text-decoration:none;	display:block;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;}.es-menu amp-img, .es-button amp-img {	vertical-align:middle;}.es-wrapper {	width:100%;	height:100%;}.es-wrapper-color {	background-color:#F6F6F6;}.es-header {	background-color:#3D4C6B;}.es-header-body {	background-color:#3D4C6B;}.es-header-body p, .es-header-body ul li, .es-header-body ol li {	color:#B7BDC9;	font-size:16px;}.es-header-body a {	color:#B7BDC9;	font-size:16px;}.es-content-body {	background-color:#F6F6F6;}.es-content-body p, .es-content-body ul li, .es-content-body ol li {	color:#999999;	font-size:16px;}.es-content-body a {	color:#75B6C9;	font-size:16px;}.es-footer {	background-color:transparent;}.es-footer-body {	background-color:transparent;}.es-footer-body p, .es-footer-body ul li, .es-footer-body ol li {	color:#999999;	font-size:14px;}.es-footer-body a {	color:#999999;	font-size:14px;}.es-infoblock, .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li {	line-height:120%;	font-size:12px;	color:#CCCCCC;}.es-infoblock a {	font-size:12px;	color:#CCCCCC;}h1 {	font-size:40px;	font-style:normal;	font-weight:bold;	color:#444444;}h2 {	font-size:28px;	font-style:normal;	font-weight:normal;	color:#444444;}h3 {	font-size:18px;	font-style:normal;	font-weight:normal;	color:#444444;}.es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a {	font-size:40px;}.es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a {	font-size:28px;}.es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a {	font-size:18px;}a.es-button, button.es-button {	border-style:solid;	border-color:#75B6C9;	border-width:15px 25px 15px 25px;	display:inline-block;	background:#75B6C9;	border-radius:28px;	font-size:18px;	font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;	font-weight:normal;	font-style:normal;	line-height:120%;	color:#FFFFFF;	text-decoration:none;	width:auto;	text-align:center;}.es-button-border {	border-style:solid solid solid solid;	border-color:#75B6C9 #75B6C9 #75B6C9 #75B6C9;	background:#75B6C9;	border-width:1px 1px 1px 1px;	display:inline-block;	border-radius:28px;	width:auto;}@media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150% } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:30px; text-align:center } h2 { font-size:26px; text-align:center } h3 { font-size:20px; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px } .es-menu td a { font-size:16px } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px } *[class="gmail-fix"] { display:none } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left } .es-m-txt-r amp-img { float:right } .es-m-txt-c amp-img { margin:0 auto } .es-m-txt-l amp-img { float:left } .es-button-border { display:block } a.es-button, button.es-button { font-size:20px; display:block; border-width:15px 25px 15px 25px } .es-btn-fw { border-width:10px 0px; text-align:center } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100% } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%; max-width:600px } .es-adapt-td { display:block; width:100% } .adapt-img { width:100%; height:auto } td.es-m-p0 { padding:0px } td.es-m-p0r { padding-right:0px } td.es-m-p0l { padding-left:0px } td.es-m-p0t { padding-top:0px } td.es-m-p0b { padding-bottom:0 } td.es-m-p20b { padding-bottom:20px } .es-mobile-hidden, .es-hidden { display:none } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto; overflow:visible; float:none; max-height:inherit; line-height:inherit } tr.es-desk-hidden { display:table-row } table.es-desk-hidden { display:table } td.es-desk-menu-hidden { display:table-cell } .es-menu td { width:1% } table.es-table-not-adapt, .esd-block-html table { width:auto } table.es-social { display:inline-block } table.es-social td { display:inline-block } }</style></head> <body><div class="es-wrapper-color"> <!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"> <v:fill type="tile" color="#f6f6f6"></v:fill> </v:background><![endif]--><table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"><tr><td valign="top"><table cellpadding="0" cellspacing="0" class="es-header" align="center"><tr><td align="center"><table bgcolor="#3d4c6b" class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="640"><tr><td class="es-p20t es-p20r es-p20l" align="left"><table width="100%" cellspacing="0" cellpadding="0"><tr><td width="600" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" role="presentation"><tr><td class="es-p25t es-p10b" align="center"><h2 style="font-size: 40px;color: #ffffff">Confirm your&nbsp;Email</h2></td></tr></table></td></tr></table></td></tr></table></td> </tr></table><table class="es-content" cellspacing="0" cellpadding="0" align="center"><tr><td style="background-color: #3d4c6b;background-size: cover" bgcolor="#3d4c6b" align="center"><table class="es-content-body" style="background-color: transparent" width="640" cellspacing="0" cellpadding="0" bgcolor="rgba(0, 0, 0, 0)" align="center"><tr><td class="es-p20t es-p15b es-p20r es-p20l" align="left"><table width="100%" cellspacing="0" cellpadding="0"><tr><td width="600" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" role="presentation"><tr><td class="es-p15t es-p20b" align="center"><p style="color: #b7bdc9;font-family: \'open sans\', \'helvetica neue\', helvetica, arial, sans-serif">You\'re so close, all you have to do is confirm your email, and you can finally be a part of the yuea family.</p></td> </tr><tr><td class="es-p5t es-p40b" align="center"><span class="es-button-border" style="border-radius: 0px;background: #6ef961"><a href="https://yuea.my.to/tutorials/videobox/confirm.php?code='.$code.'" class="es-button es-button-1" target="_blank" style="color: #ffffff;background: #6ef961;border-color: #6ef961;border-radius: 0px;border-width: 15px 50px">Confirm</a></span></td></tr></table></td></tr></table></td></tr><tr><td class="es-p20t es-p20r es-p20l" align="left"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="600" align="center" valign="top"><table cellpadding="0" cellspacing="0" width="100%" role="presentation"><tr><td align="left"><p>If the above button does not work, use this link<br><br>https://www.yuea.my.to/tutorials/videobox/confirm.php?code='.$code.'</p></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></div></body></html>';
		$backupInviteEmail = "You've been Invited!\nAll you have to do is go to yuea.my.to/tutorials/videobox/join.php?inv=".$code;
		$backupVerificationEmail = "Confirm your Email\nOne last step, just go to yuea.my.to/tutorials/videobox/confirm.php?code=".$code." and you can finally be a part of the yuea family!";

		if ($i == 0) {
			$sub = "You have been invited!";
			$bod = $inviteEmail;
			$altBod = $backupInviteEmail;
		} else {
			$sub = "Verify your email";
			$bod = $verificationEmail;
			$altBod = $backupVerificationEmail;
		}
		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                	    //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'noreply.yuea@gmail.com';               //SMTP username
			$mail->Password   = 'jzzmnwwywkelospe';			    //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('no-reply@yuea.my.to', 'no-reply');
			$mail->addAddress($email);     //Add a recipient

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $sub;
			$mail->Body    = $bod;
			$mail->AltBody = $altBod;

			$mail->send();
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}

?>