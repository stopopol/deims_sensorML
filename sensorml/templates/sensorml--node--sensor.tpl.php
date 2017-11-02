<?php

ini_set( 'default_charset', 'UTF-8' );

$deimsURL = $GLOBALS['base_url'];

$node = menu_get_object();

$uuid = "fsdfdsf";

?>

<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>


<sml:PhysicalSystem gml:id="<?php echo $uuid; ?>">
    <gml:description>A weather station on top of the 52North building</gml:description>
    <!--Unique identifier -->
    <gml:identifier codeSpace="uniqueID">f80591a1-d2f1-4387-b6f4-a7afddf5e599</gml:identifier>

    <sml:keywords>
      <sml:KeywordList>
        <sml:keyword>weather station</sml:keyword>
        <sml:keyword>precipitation</sml:keyword>
        <sml:keyword>wind speed</sml:keyword>
        <sml:keyword>temperature</sml:keyword>
      </sml:KeywordList>
    </sml:keywords>

    <sml:identification>
      <sml:IdentifierList>
        <sml:identifier>
          <sml:Term definition="urn:ogc:def:identifier:OGC:1.0:shortName">
            <sml:label>short name</sml:label>
            <sml:value>Weather station 123</sml:value>
          </sml:Term>
        </sml:identifier>
        <sml:identifier>
          <sml:Term definition="urn:ogc:def:identifier:OGC:1.0:longName">
            <sml:label>long name</sml:label>
            <sml:value>Weather station 123 on top of the 52North building</sml:value>
          </sml:Term>
        </sml:identifier>
      </sml:IdentifierList>
    </sml:identification>

    <sml:classification>
      <sml:ClassifierList>
        <sml:classifier>
          <sml:Term definition="http://www.opengis.net/def/property/OGC/0/SensorType">
            <sml:label>sensorType</sml:label>
            <sml:value>weather station</sml:value>
          </sml:Term>
        </sml:classifier>
      </sml:ClassifierList>
    </sml:classification>

    <sml:contacts>
      <sml:ContactList>
        <sml:contact>
          <gmd:CI_ResponsibleParty>
            <gmd:individualName>
              <gco:CharacterString>Arne Bröring</gco:CharacterString>
            </gmd:individualName>
            <gmd:organisationName>
              <gco:CharacterString>52North</gco:CharacterString>
            </gmd:organisationName>
            <gmd:positionName>
              <gco:CharacterString>Software Engineer</gco:CharacterString>
            </gmd:positionName>
            <gmd:contactInfo>
              <gmd:CI_Contact>
                <gmd:address>
                  <gmd:CI_Address>
                    <gmd:deliveryPoint>
                      <gco:CharacterString>Martin-Luther-King-Weg 24</gco:CharacterString>
                    </gmd:deliveryPoint>
                    <gmd:city>
                      <gco:CharacterString>Muenster</gco:CharacterString>
                    </gmd:city>
                    <gmd:country>
                      <gco:CharacterString>Germany</gco:CharacterString>
                    </gmd:country>
                    <gmd:electronicMailAddress>
                      <gco:CharacterString>swe@52north.org</gco:CharacterString>
                    </gmd:electronicMailAddress>
                  </gmd:CI_Address>
                </gmd:address>
                <gmd:onlineResource>
                  <gmd:CI_OnlineResource>
                    <gmd:linkage>
                      <gmd:URL>http://52North.org</gmd:URL>
                    </gmd:linkage>
                  </gmd:CI_OnlineResource>
                </gmd:onlineResource>
              </gmd:CI_Contact>
            </gmd:contactInfo>
            <gmd:role>
              <gmd:CI_RoleCode codeList="someServer/codeList.xml#CI_RoleCode"
                codeListValue="pointOfContact"/>
              </gmd:role>
          </gmd:CI_ResponsibleParty>
        </sml:contact>
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