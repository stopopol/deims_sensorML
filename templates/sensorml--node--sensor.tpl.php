<?php

ini_set( 'default_charset', 'UTF-8' );

$deimsURL = $GLOBALS['base_url'];

$node = menu_get_object();

// necessary sensorML variables
$uuid = render($content['field_uuid']);
$description = render($content['field_description']);
$keywords = render($content['field_keywords_envthes']);
$parent_site = render($content['field_parent_site_name']);
$sensor_type = render($content['field_sensortype']);
$contact = render($content['field_person_contact']);


?>

<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<sml:PhysicalSystem gml:id="<?php echo print ($label); ?>" 
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
<!-- not sure if the definitions for sams and sf really belong here --> 

    <gml:description><?php echo $description; ?></gml:description>
    <!--Unique identifier -->
    <gml:identifier codeSpace="uniqueID"><?php echo $uuid; ?></gml:identifier>

    <?php print render($content['keywordSets']); ?></sml:keyword>

    <sml:identification>
      <sml:IdentifierList>
        <sml:identifier>
          <sml:Term definition="urn:ogc:def:identifier:OGC:1.0:shortName">
            <sml:label>short name</sml:label>
            <sml:value><?php echo print ($label); ?></sml:value>
          </sml:Term>
        </sml:identifier>
        <sml:identifier>
          <sml:Term definition="urn:ogc:def:identifier:OGC:1.0:longName">
            <sml:label>long name</sml:label>
            <sml:value><?php echo print ($label); ?> deployed at site <?php echo $parent_site; ?></sml:value>
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

    <sml:contacts>
		<sml:ContactList>
            <?php echo ($contact); ?>
		</sml:ContactList>
    </sml:contacts>

    <sml:featuresOfInterest>
      <sml:FeatureList>
        <sml:feature>
          <sams:SF_SpatialSamplingFeature gml:id="SamplingPoint1">
            <gml:identifier codeSpace=""> http://myServer.org/features/SamplingPointAt52NorthHeadquarters</gml:identifier>
            <sf:type xlink:href="http://www.opengis.net/def/samplingFeatureType/OGC-OM/2.0/SF_SamplingPoint"/>
            <sf:sampledFeature xsi:nil="true"/>
            <sams:shape>
              <gml:Point gml:id="UOMlocation">
                <gml:pos srsName="http://www.opengis.net/def/crs/EPSG/0/4326">50.7167 7.76667</gml:pos>
              </gml:Point>
            </sams:shape>
          </sams:SF_SpatialSamplingFeature>
        </sml:feature>
      </sml:FeatureList>
    </sml:featuresOfInterest>

    <sml:outputs>
      <sml:OutputList>
        <sml:output name="precipitation">
          <swe:Quantity definition="http://sweet.jpl.nasa.gov/2.3/phen.owl#Precipitation">
            <swe:uom code="mm"/>
          </swe:Quantity>
        </sml:output>
        <sml:output name="temperature">
          <swe:Quantity definition="http://sweet.jpl.nasa.gov/2.3/propTemperature.owl#Temperature">
            <swe:uom code="Cel"/>
          </swe:Quantity>
        </sml:output>
      </sml:OutputList>
    </sml:outputs>
</sml:PhysicalSystem>