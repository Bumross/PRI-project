<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <head>
        <title>Alcohol Experiences</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a202c; /* Dark red background */
            color: #ffffff; /* White text */
          }
          h2 {
            font-size: 2em;
            text-align: center;
            margin-bottom: 5px;
        }

            h3 {
            font-size: 2em;
            text-align: center;
            margin-bottom: 2px;
        }

          .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            margin-bottom: 100px; /* Adjust bottom margin to prevent overlap with footer */
          }

          .type-brand-container {
            text-align: center;
            margin-bottom: 20px;
          }

          .type-brand-container h2 {
            font-size: 2em;
            margin-bottom: 5px;
          }

          .history-container {
            background-color: #1f2937;
            color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 10px;
          }

          .details-container {
            margin-bottom: 20px;
          }

          .details-table {
            width: 100%;
            border-collapse: collapse;
          }

          .details-table th, .details-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
          }

          .details-table th {
            background-color: #1f2937; /* Dark red background */
            color: #ffffff; /* White text */
          }

          .details-table tr:hover {
            background-color: #f5f5f5;
          }

          .details-table td {
            background-color: #1f2937; /* Dark red background */
            color: #ffffff; /* White text */
          }

          .location-container {
            margin-bottom: 20px;
          }

          .location-container h3 {
            margin-bottom: 10px;
          }

          .location-container p {
            margin: 5px 0;
          }

          .location-link {
            color: #4CAF50; /* Green color for links */
            text-decoration: none; /* Remove underline */
          }

          footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
          }
        </style>
      </head>
      <body>
        <div class="container">
          <xsl:for-each select="AlcoholExperiences/AlcoholExperience">
            <div class="type-brand-container">
              <h2><xsl:value-of select="Brand"/></h2>
              <h3><xsl:value-of select="Type"/></h3>
            </div>
            <div class="history-container">
              <h3>History</h3>
              <p><xsl:value-of select="History"/></p>
            </div>
            <div class="details-container">
              <table class="details-table">
                <tr>
                  <th>Color</th>
                  <td><xsl:value-of select="Details/Color"/></td>
                </tr>
                <tr>
                  <th>Taste Category</th>
                  <td><xsl:value-of select="Details/Taste/Category"/></td>
                </tr>
                <tr>
                  <th>Taste Description</th>
                  <td><xsl:value-of select="Details/Taste/Description"/></td>
                </tr>
                <tr>
                  <th>Garnish</th>
                  <td><xsl:value-of select="Details/Garnish"/></td>
                </tr>
                <tr>
                  <th>Serving Suggestions</th>
                  <td><xsl:value-of select="Details/ServingSuggestions"/></td>
                </tr>
                <tr>
                  <th>Mixing Suggestions</th>
                  <td><xsl:value-of select="Details/MixingSuggestions"/></td>
                </tr>
              </table>
            </div>
            <div class="location-container">
              <h3>Purchase Locations</h3>
              <xsl:apply-templates select="PurchaseLocations/Location"/>
            </div>
            <div class="location-container">
              <h3>Tasting Locations</h3>
              <xsl:apply-templates select="TastingLocations/Location"/>
            </div>
          </xsl:for-each>
        </div>
        <footer>
          This is the footer. Replace this with your footer content.
        </footer>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="Location">
    <p><strong><xsl:value-of select="Name"/>:</strong> <xsl:value-of select="Address"/> (<a class="location-link" href="{URL}">Link</a>)</p>
  </xsl:template>

</xsl:stylesheet>
