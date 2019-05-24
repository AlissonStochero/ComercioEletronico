<?php
class Tools
{
public static function getValue($key, $defaultValue = false)
  {
      if (!isset($key) || empty($key) || !is_string($key)) {
          return false;
      }
      // (isset(Tools::getAxiosValue($key)) ? (Tools::getAxiosValue($key)) : $defaultValue));
      $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $defaultValue));

      if (empty($ret)){
          if(Tools::getAxiosValue($key)){
              $ret = Tools::getAxiosValue($key);
          }else{
              $ret = false;
          }
      }
      if (is_string($ret)) {
          return stripslashes(urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret))));
      }

      return $ret;
  }

  public static function getAxiosValue($key=NULL){
      $ax = json_decode(file_get_contents('php://input'));
      // foreach ($ax as $key => $value) {
      //     return $value;
      // }
      $ax = (array)$ax;
      if(isset($ax[$key])){
          return $ax[$key];
      }else{
          return false;
      }
  }

  public static function getPage(){
      $page = Tools::getValue('page');
      return $page;
  }


  public static function loadPage($page_parameter = NULL){
      if (empty($page_parameter)){
          $page = Tools::getPage();
      }else{
          $page = $page_parameter;
      }

      if (empty($page)){
          $page = "home";
      }

      return $page;
  }

  public static function redirectPage($link, $params = NULL)
  {

      if (isset($params)){
          foreach($params as $key=>$value){
              $extraParams[] = $key."=".$value;
          }
          $v = implode("&", $extraParams);
          $v = "&".$v;
      }
      if (empty($link)){
          header("Location:index.php");
      }else{
          header("Location:index.php?page=".$link.$v);
      }
      exit;
  }

  public static function getPageParameters(){
      $qString = $_SERVER['QUERY_STRING'];
      parse_str($qString, $get_array);
      $urlQueryArray = (object)$get_array;
      return $urlQueryArray;

  }


  public static function getUrlQuery(){
      $ar = Tools::getPageParameters();
      $ar = (object)$ar;
      return $ar;
  }

  public static function getAlert()
  {
      $alert = Tools::getValue('alert');
      return (object)$alert;
  }

  public static function removeAcentos($text) {
      $listaAcentos = \Tools::consultaReplaceAcentos();
      foreach ($listaAcentos as $key => $acentos) {
          $acentos = (object)($acentos);
          $from = $acentos->from;
          $to = $acentos->to;
          $i=0;
          for($i=0; $i <= strlen($from); $i++){
             $text = str_replace(utf8_encode($from[$i]), $to[$i], $text);
          }
      }
      return utf8_encode($text);
  }



}
