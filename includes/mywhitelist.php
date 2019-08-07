<?php
$options = get_option( 'mywl_settings' );
$plugins_url = plugins_url();
?>
<div  id="head">
<html>
<head>
<title><?php echo $options['mywl_brand']; ?> Email Whitelist Instructions</title>
<meta name="head" property="og:title" content="<?php echo $options['mywl_brand']; ?> Email Whitelist Instructions">
<meta property="og:description" content="Whitelist <?php echo $options['mywl_brand']; ?> to be sure you get the email you requested...">
<meta property="og:type" content="article">
<meta property="og:image" content="https://s3.amazonaws.com/wlist-images/email-whitelist-screenshot-full.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Whitelist <?php echo $options['mywl_brand']; ?> to be sure you get the email you requested...">

<link rel="stylesheet" href=<?php echo plugins_url('/css/style.css',__FILE__ ); ?> />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.css'>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
</head>
<body>

<a href="#source-code" class="view-source">View Source</a>

<div id="source-code">
<a href="#" id="x"><img src="http://css-tricks.com/examples/ViewSourceButton/images/x.png" alt="close"></a>
</div>
<?php include('mywhitelist-html.php'); ?>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script type='text/javascript' src=<?php echo plugins_url('/js/scripts.js',__FILE__ ); ?>></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js" type="text/javascript"></script>
</body>
</html>
</div>