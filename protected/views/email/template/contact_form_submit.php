<html>
    <body>    
        <div style="position: relative; padding: 10px"> 
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="text-align: left">
                        <p>
                            Dear Site Admin, <br/><br/>New contact enquiry received with following information on <?php echo Yii::app()->dateFormatter->formatDateTime(time(), 'short'); ?>
                            <br/>
                            <h1 style="font-size: 15px; color: red"><b>Client enquiry reference number : #<?php echo $model->id; ?></b></h1>
                            <br/>Best regards,  
                            <br/><br/><img src="<?php echo 'http://'. ((Yii::app()->request->getServerName() == 'localhost' || Yii::app()->request->getServerName() == '54.243.210.21') ? Yii::app()->request->getServerName() . '/ymbrealty' : Yii::app()->request->getServerName()); ?>/images/logo.png" style="width: 150px"/>
                            <br/><br/>Office number : 011-52-969-934-8010 
                            <br/>Cell : 999-129-7321
                            <br/>Canada / USA dial : 702-997-3047
                            <br/>Skype : yucatanrob
                        </p>
                    </td>
                </tr>
            </table>    
        </div>    
        <div style="position: relative; padding: 20px; margin-left: 10px; border: solid 1px silver; background: #f7f7f7; border-radius: 10px; font-size: 15px; width: 100%">
            <table border="0" cellpadding="2" cellspacing="2" width="100%">
                <tr>
                    <td style="width: 200px"><b>Name</b></td>
                    <td><?php echo $model->name; ?></td>
                </tr>
                <tr>
                    <td style="width: 200px"><b>Address</b></td>
                    <td><?php echo $model->address; ?></td>
                </tr>
                <tr>
                    <td style="width: 200px"><b>Skype or Contact no</b></td>
                    <td><?php echo $model->contact_number; ?></td>
                </tr>
                <tr>
                    <td style="width: 200px"><b>Email Address</b></td>
                    <td><?php echo $model->email; ?></td>
                </tr>
                <tr>
                    <td style="width: 200px"><b>Message</b></td>
                    <td><?php echo $model->message; ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>