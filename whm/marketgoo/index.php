<?php

    require("lib.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MarketGoo cPanel/WHM Plug-in">
    <meta name="author" content="MarketGoo">
    <link rel="shortcut icon" href="assets/favicon.png">

    <title>MarketGoo cPanel/WHM Plug-in</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="assets/js/jquery-2.0.3.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">

        <a href="http://www.marketgoo.com/" target="_blank" class="navbar-brand">MarketGoo</a>
        <p class="navbar-text">for cPanel</p>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="https://partners.marketgoo.com/login/" target="_blank">Log in</a></li>
            <li><a href="mailto:support@marketgoo.com">Get Support</a></li>
        </ul>

    </div>
    </nav>

    <div class="container main-content">
    <div class="row">

    <div class="col-md-8">

        <div class="alert alert-success">
            The plug-in is correctly installed and ready to use.
        </div>

<?php	if (is_new_version_available()) { ?>
        <div class="alert alert-danger">
            <strong>There is a new version of the plug-in available.</strong><br />
            Please, <a href="http://www.marketgoo.com/partners/cpanel/" target="_blank">click here</a> for installation instructions
        </div>
<?php	} ?>

        <div class="panel panel-primary">
            <div class="panel-heading">
                Your <strong>Partner ID</strong>
            </div>
            <div class="panel-body">
                <code><?php echo get_partnerid(); ?></code>
            </div>
        </div>

        <div class="config-instructions">
        <h2>Configuration instructions</h2>
        <ol>
            <li>Access or Sign up in your partner portal at <a href="https://partners.marketgoo.com/" target="_blank">partners.marketgoo.com</a></li>
            <li>Add this server PartnerID shown above into the <strong>Add Server</strong> section</li>
            <li>You are set up, start generating 20% commissions from your
                users and claim payments through <strong>Payments</strong> section in the
                partner portal</li>
        </ol>
        </div>

        <div class="quick-faq">
        <h2>Partnership Frequently Asked Questions</h2>
        <dl>
            <dt>What is the Partner ID?</dt>
            <dd>As part of the MarketGoo plug-in for cPanel, you can partner
                with us to earn a commission on each MarketGoo subscription.
                You can earn a <strong>20% revenue share</strong>
                from your referred customers. This is one of the
                <strong>largest commissions in the industry</strong>!
                <br />
                <a href="http://www.marketgoo.com/partners/cpanel/" target="_blank">Learn more about our commission system</a>
                or
                <a href="mailto:support@marketgoo.com">contact MarketGoo support</a>.</dd>

            <dt>Why is the Partner ID autogenerated?</dt>
            <dd>We have autogenerated the Partner ID for your convenience. You
                are not obligated to join the partneship program, but when you
                do you've already a Partner ID ready.</dd>

            <dt>I have many servers! Do I have to use multiple PartnerIDs?</dt>
            <dd>No, you can reuse one of your existing PartnerID so you can
                group different server clusters. For further instructions
                please visit our <a href="http://support.marketgoo.com/customer/portal/articles/1334730-how-to-install-marketgoo-cpanel-plugin" target="_blank">documentation about reusing PartnerID</a>.</dd>

        </dl>
        </div>
    </div>

    <div class="col-md-4">
        <div class="col-benefits">
            <h3>Benefits of MarketGoo Partnership</h3>
            <dl>
                <dt>High profit margins</dt>
                <dd>Earn 20% revenue share from your referred customers.
                    One of the largest commissions in the industry!</dd>

                <dt>Increase retention</dt>
                <dd>By satisfying your customers, you will increase your
                    retention rate and your business will grow
                    exponentially.</dd>

                <dt>Differentiate your services</dt>
                <dd>MarketGoo is the most complete website marketing app
                    offered to SMBs. Outmaneuver your competition by offering
                    the best solution available.</dd>

                <dt>Seamless integration</dt>
                <dd>MarketGoo integrates with your host perfectly as a cPanel
                    application for an easy deployment and activation.</dd>
            </dl>
            <a href="http://www.marketgoo.com/partners/cpanel/" target="_blank" class="btn btn-primary">Learn more &raquo;</a>
        </div>
    </div>

    </div>  <!-- end:row -->
    </div>  <!-- end:container -->

</body>
</html>
