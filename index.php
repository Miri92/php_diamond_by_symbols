<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

  </head>
  <body>


    <?php
    function menampilkan_diamond(){
        $error_message    = '';
        
        $diameter_diamond   = (int)$_POST["diameter_diamond"];
        if($diameter_diamond<=0){
            $error_message    .= '0<br>';
        }
        $diamond_symbol   = $_POST["diamond_symbol"];
        
        if($error_message != ''){
            return $error_message;
        }
        else{
            $limit       = $diameter_diamond;
            $math        = ($diameter_diamond+1)/2;
            $output_diamond  = '';
            for($index=1;$index<=$limit;$index++){
                $output_diamond  .= '<tr>';
                for($subIndex=1;$subIndex<=$limit;$subIndex++){

                    if( ($index-$subIndex<$math) && 
                        ($index+$subIndex>$math) && 
                        ($subIndex-$index<$math) && 
                        ($subIndex+$index<$diameter_diamond+$math+1)){
                        $output_diamond  .= '<td style="background:white;font-size:18px">'.$diamond_symbol.'</td>';
                    }
                    else{
                        $output_diamond  .= '<td></td>';
                    }
                }
                $output_diamond  .= '</tr>';
            }
            return $output_diamond;
        }
    }
    ?>

    <div class="container mx-auto  px-4 mt-8">
<form id="theForm" class="w-full max-w-lg" method="POST" action="?">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Diametr">
        Diametr
      </label>


      <div class="relative">
        <select id="diameter_diamond" name="diameter_diamond" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <?php

            for($d_index=1;$d_index<=20;$d_index++){

                if (isset($_POST["diameter_diamond"]) && $_POST["diameter_diamond"] == $d_index) {
                  $selected = 'selected';
                } else {
                    $selected = null;
                }
                echo ' <option value="'.$d_index.'" '.$selected.'>'.$d_index.'</option>';
            }
          ?>
         
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>


    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Symbol">
        Symbol
      </label>


      <div class="relative">
        <select id="diamond_symbol" name="diamond_symbol" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="@" <?php echo isset($_POST["diamond_symbol"]) && $_POST["diamond_symbol"] == '@' ? 'selected':'';?>>@</option>
            <option value="$" <?php echo isset($_POST["diamond_symbol"]) && $_POST["diamond_symbol"] == '$' ? 'selected':'';?>>$</option>
            <option value="*" <?php echo isset($_POST["diamond_symbol"]) && $_POST["diamond_symbol"] == '$' ? 'selected':'';?>>*</option>
            <option value="#" <?php echo isset($_POST["diamond_symbol"]) && $_POST["diamond_symbol"] == '#' ? 'selected':'';?>>#</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">

      <button class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        make
      </button>  
    </div>
  </div>

  
           
        </form>
        <div>
          <table class="table-auto">
            <tbody>
              <?php
                  if(isset($_POST["diameter_diamond"])){
                      echo '<div class="dos_sukalogika">';
                      echo menampilkan_diamond();
                      echo '</div>';
                  }               
              ?>
            </tbody>
          </table>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


    <script type="text/javascript">
      

      $(document).ready(function(){
          console.log('jquery loaded');

          $('#diameter_diamond').change(function(){
              console.log('change event');
              $('#theForm').submit();
          });
          $('#diamond_symbol').change(function(){
              console.log('change event');
              $('#theForm').submit();
          });

      });

    </script>
  </body>
</html>