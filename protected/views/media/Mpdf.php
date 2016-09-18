<h1>Mpdf</h1>
1. Change Page Orientation

Use CSS3 page and sheet-size attribute to change page orientation. 

<style type="text/css">
    .landscape {
        page: a4landscape;
    }
    .portrait {
        page: a4portrait;
    }

    @page a4portrait {
        sheet-size: A4;
    }
    @page a4landscape {
        sheet-size: A4-L;
    }
</style>

<div class="landscape"> Portrait page </div>
<div class="landscape"> Landscape page </div>



 2. Change page margins

To change page margins, you need to give additional parameter to mPDF's constructors. The page margins are in milimeters. Note the example uses Yii pdf extension instead of calling mPDF directly.

                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4',0,'',5,5);

3. Fit a table into one page

 To fit a table in entirety onto single page, we could use CSS attribute page-break-inside:avoid on the table.

<table style="page-break-inside: avoid;"> ... </table>
...

And you might want to enlarge the maximum shrink factor (the larger the value, the smaller we allow mPDF to shrink tables) :
                $mPDF1->shrink_tables_to_fit = 10;
 
4. Fit contents of a div into one page

We might need to fit not only one table but one DIV containing many tables and other tags. The DIV should be only one DIV and directly under HTML BODY.
<body>
<div style="bottom: 0; left: 0; position: fixed; right: 0; top: 0;"> 
...
</div> </body>
5. Change center to other tag with center class

The center tag is deprecated and not supported by mPDF library.
<center> This is a title </center>

should be changed onto
<div class="center"> This is another title</div>

<style type="text/css">
.center {

   text-align: center; 

}

</style>


6. Accelerate page rendering

Sometimes mPDF takes a long time to render pages because it iteratively tries to fit elements. So you might want to change this parameter to speed things up (the normal value is 10, meaning mPDF iterates in 1/10 increments):
                $mPDF1->incrementFPR1 = 4;
				
<!--------------------------------------------------------------------------------------------------------------------------------------------------------->
<h1>TCPDF and MPDF</h1>
THE QUEST FOR A FAST PHP PDF LIBRARY

We usually render pdfs with TCPDF. Those pdfs are created in html and are simple pdfs of only a few pages, with invoices, tickets and similars.
But we had a problem with the exporting of listings. When somebody tries to export a listing of 15000 products or clients. He expects to get it in a reasonable time. But with the mixing of Doctrine and html rendering in pdfs it gets very slow, and only with a few thousand records the rendering time reached the maximum execution time or memory limit, so we had no pdf at all.
The first thing we had to do was to speed up the process of building the data, changing the hydration mode to HYDRATE_SCALAR and avoiding objects, lazy loading and all those nice but slow things Doctrine has.

The other thing was to find a faster way to generate pdfs. We first tried with other libraries (DomPdf, mpdf, wkhtmltopdf),  but the rendering time was similar or not enough fast.

The right one was FPDF . It is an old library, it doesn’t have native html rendering but if you work with cells it is very fast.

It supports the basic things you may need (page formats, fonts, margins, headers, footers, colors, images, …)

In our case, we wanted to draw listings as simple paginated tables, with headers. There is an example of tables with multicells that suited our needs. The trick is to calculate the maximum height of the text for the cells of each line, and force a pagebreak if needed.

If you need a header or footer, you have to implement the Header() and Footer() methods:

  function Header()
  {
    $this->SetFont($this->FontFamily, 'B', 11);
 
    $pagew = $this->w;
    $availableWidth = $pagew - $this->lMargin - $this->lMargin;
 
    $this->Cell($availableWidth, 10, 'My Title', 0, 1);
  }
 
  function Footer()
  {
    $this->SetFont($this->FontFamily, 'I', 8);
 
    $this->Cell(0,10, utf8_decode('Page '.$this->PageNo().'/{nb}'),0,0,'C');
  }
Something you have to take into account is the enconding. If you are working with utf-8 characters, you have to use utf8_decode, so that the text is drawn right.

Now, a pdf of four hundred records takes only 2 seconds instead of one minute. And one with all the records and more than one thousand pages, takes only 55 seconds to generate (and 25 of them are dedicated to the doctrine hydration).