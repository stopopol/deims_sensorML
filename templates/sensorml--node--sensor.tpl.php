<?php

	ini_set( 'default_charset', 'UTF-8' );

	$deimsURL = $GLOBALS['base_url'];

	$node = menu_get_object();

	// necessary sensorML variables - all required fields on DEIMS-SDR
	$uuid = render($content['field_uuid']);
	$description = render($content['field_description']);
	$keywords = render($content['field_keywords_envthes']);
	$parent_site = render($content['field_parent_site_name']);
	$sensor_type = render($content['field_sensortype']);
	$contact = render($content['field_person_contact']);
	$deims_sensor_url = $deimsURL . "/sensor/" . $uuid;
	$coordinates = render($content['field_coordinates']);
	$parameters = render($content['field_parameters_taxonomy']);
	$label_wo_whitespace = str_replace(' ', '_', $label);

?>

<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<sml:PhysicalSystem gml:id="<?php echo ($label_wo_whitespace); ?>"
xmlns:sml="http://www.opengis.net/sensorml/2.0"
xmlns:swe="http://www.opengis.net/swe/2.0"
xmlns:gml="http://www.opengis.net/gml/3.2"
xmlns:gmd="http://www.isotc211.org/2005/gmd"
xmlns:gco="http://www.isotc211.org/2005/gco"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xlink="http://www.w3.org/1999/xlink"
xsi:schemaLocation="http://www.opengis.net/sensorml/2.0 http://schemas.opengis.net/sensorml/2.0/sensorML.xsd"
xmlns:sams="http://www.opengis.net/samplingSpatial/2.0"
xmlns:sf="http://www.opengis.net/sampling/2.0">
    <gml:description><?php echo $description; ?></gml:description>
    <gml:identifier codeSpace="uniqueID"><?php echo $uuid; ?></gml:identifier>
    <sml:keywords><?php print render($content['keywordSets']); ?></sml:keywords>
    <sml:identification>
      <sml:IdentifierList>
        <sml:identifier>
          <sml:Term definition="urn:ogc:def:identifier:OGC:1.0:shortName">
            <sml:label>short name</sml:label>
            <sml:value><?php echo $label; ?></sml:value>
          </sml:Term>
        </sml:identifier>
        <sml:identifier>
          <sml:Term definition="urn:ogc:def:identifier:OGC:1.0:longName">
            <sml:label>long name</sml:label>
            <sml:value><?php echo $label ; ?> deployed at site <?php echo $parent_site; ?></sml:value>
          </sml:Term>
        </sml:identifier>
      </sml:IdentifierList>
    </sml:identification>
	
	<sml:classification>
      <sml:ClassifierList>
        <sml:classifier>
          <sml:Term definition="http://www.opengis.net/def/property/OGC/0/SensorType">
            <sml:label>sensorType</sml:label>
            <sml:value><?php echo $sensor_type; ?></sml:value>
          </sml:Term>
        </sml:classifier>
      </sml:ClassifierList>
    </sml:classification>
	
	<sml:capabilities name="offerings">
        <sml:CapabilityList>
            <sml:capability name="offeringID">
                <swe:Text definition="urn:ogc:def:identifier:OGC:offeringID">
                    <swe:label>Main Offering</swe:label>
					<swe:value><?php echo $uuid; ?>/offering/1</swe:value>
                </swe:Text>
            </sml:capability>
        </sml:CapabilityList>
    </sml:capabilities>

	<sml:contacts>
		<sml:ContactList><?php echo $contact; ?></sml:ContactList>
	</sml:contacts>

	
	<?php if (!empty($coordinates)): ?>	
    <sml:featuresOfInterest>
      <sml:FeatureList>
        <sml:feature>
          <sams:SF_SpatialSamplingFeature gml:id="SamplingPoint1">
            <gml:identifier codeSpace=""> <?php echo $deims_sensor_url; ?></gml:identifier>
            <sf:type xlink:href="http://www.opengis.net/def/samplingFeatureType/OGC-OM/2.0/SF_SamplingPoint"/>
            <sf:sampledFeature xsi:nil="true"/>
            <sams:shape>
              <gml:Point gml:id="stationLocation">
                 <?php echo $coordinates; ?>
              </gml:Point>
            </sams:shape>
          </sams:SF_SpatialSamplingFeature>
        </sml:feature>
      </sml:FeatureList>
    </sml:featuresOfInterest>
	<?php endif; ?>
	
    <sml:outputs>
      <sml:OutputList>
		<?php echo $parameters; ?>
      </sml:OutputList>
    </sml:outputs>
	
</sml:PhysicalSystem>