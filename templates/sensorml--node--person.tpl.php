<?php
/**
 * This template does not have a surrounding XML element because it is re-used
 * by other elements.
 */
?>

<?php 
// variables
$name = render($content['field_name']);

$organization = render($content['field_organization']);
if ($organization){ 
	$organization = "<gmd:organisationName><gco:CharacterString>" . $organization . "</gco:CharacterString></gmd:organisationName>";
}

$email = render($content['field_email']);

$url = render($content['field_url']);						
if ($url){ 
	$url = "<gmd:onlineResource><gmd:CI_OnlineResource><gmd:linkage><gmd:URL>" . $organization . "</gmd:URL></gmd:linkage></gmd:CI_OnlineResource></gmd:onlineResource>";
}						

?>
<sml:contact>
	<gmd:CI_ResponsibleParty>
		<gmd:individualName><?php echo $name ?></gmd:individualName>
		<?php echo $organization ?> 
		<gmd:positionName>
			<gco:CharacterString>Sensor Contact person</gco:CharacterString>
		</gmd:positionName>
		<gmd:contactInfo>
			<gmd:CI_Contact>
				<gmd:address>
					<gmd:CI_Address>
						<?php print render($content['field_address']); ?> 
						<gmd:electronicMailAddress><gco:CharacterString><?php echo $email ?></gco:CharacterString></gmd:electronicMailAddress>
					</gmd:CI_Address>
				</gmd:address>
				<?php echo $url ?>
			</gmd:CI_Contact>
		</gmd:contactInfo>
		<gmd:role>
			<gmd:CI_RoleCode codeList="http://www.isotc211.org/2005/resources/Codelist/gmxCodelists.xml#CI_RoleCode" codeListValue="pointOfContact"/>
		</gmd:role>
	</gmd:CI_ResponsibleParty>
</sml:contact>