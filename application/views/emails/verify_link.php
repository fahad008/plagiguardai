<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#eff2f5">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="left" valign="center">
					<div style="text-align:left; margin: 40px; padding: 40px; background-color:#ffffff; border-radius: 6px">
						<!--begin:Email content-->
						<div style="padding-bottom: 15px; font-size: 17px;">
							<strong>Dear <?php if (isset($name) && $name != '') { echo $name; }else{ echo 'member'; } ?>,</strong>
						</div>
						<div style="padding-bottom: 15px">We received a request to verify your email.</div>
						<div style="padding-bottom: 15px">Please verify your email address by clicking the link below:</div>
						<a href="<?php if(isset($token) && $token != ''){ ?>https://plagiguardai.com/verify?token=<?php echo $token; }else{ ?>#<?php } ?>" rel="noopener" style="text-decoration:none;color: #e6ad22">Verify</a>
						
						<div style="padding-top: 15px; padding-bottom: 15px">If the link doesn’t work, copy and paste it into your browser.</div>
						<div style="padding-bottom: 15px">If you need any assistance, please contact our support team.</div>
						<!--end:Email content-->
						<div style="padding-bottom: 10px">Kind regards,
						<br>PlagiGuardAI Team.
						<tr>
							<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
								<p>Copyright ©
								<a href="https://plagiguardai.com" style="text-decoration:none;color: #e6ad22" rel="noopener" target="_blank">PlagiGuardAI</a></p>
							</td>
						</tr></br></div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>