<html>
    <body>    
        <h1 style="font-size: 22px; padding: 10px"><b>Client Enquiry Number : #<?php echo $model->id; ?></b></h1>
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