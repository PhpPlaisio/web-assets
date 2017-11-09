<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\WebAssets;

/**
 * Interface for classes for setting web assets (things like CSS, JavaScript and image files) and generating HTML code
 * for including web assets.
 */
interface WebAssets
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Appends with a separator a string to the page title.
   *
   * @param string|null $pageTitleAddendum The string to eb append to the page title.
   *
   * @see echoPageTitle()
   * @see getPageTitle()
   * @see setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function appendPageTitle($pageTitleAddendum);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a class specific CCS file to the page.
   *
   * @param string      $className The PHP class name, i.e. __CLASS__. Backslashes will be translated to forward
   *                               slashes to construct the filename relative to the resource root of the CSS source.
   * @param string|null $media     The media for which the CSS source is optimized for. Note: use null for 'all'
   *                               devices; null is preferred over 'all'.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendClassSpecificSource($className, $media = null);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a line with a CSS snippet to the internal CSS.
   *
   * @param string $cssLine The line with CSS snippet.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendLine($cssLine);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a CCS file to the header to the page.
   *
   * @param string      $url   The URL to the CSS source.
   * @param string|null $media The media for which the CSS source is optimized for. Note: use null for 'all' devices;
   *                           null is preferred over 'all'.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendSource($url, $media = null);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the relative URL for a class specific CSS file.
   *
   * @param string      $className The PHP class name, i.e. __CLASS__. Backslashes will be translated to forward
   *                               slashes to construct the filename relative to the resource root of the CSS source.
   * @param string|null $media     The media for which the CSS source is optimized for. Note: use null for 'all'
   *                               devices; null is preferred over 'all'.
   *
   * @return string
   */
  public function cssClassNameToRootRelativeUrl($className, $media = null);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds an optimized CCS file to the page.
   *
   * Do not use this method directly. Use {@link cssAppendPageSpecificSource} instead.
   *
   * @param string      $url   The URL to the CSS source.
   * @param string|null $media The media for which the CSS source is optimized for. Note: use null for 'all'
   *                           devices; null is preferred over 'all'.
   */
  public function cssOptimizedAppendSource($url, $media = null);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos the links to external and internal CSS.
   *
   * @api
   * @since 1.0.0
   */
  public function echoCascadingStyleSheets();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos JavaScript code that will be executed using RequireJS.
   *
   * @api
   * @since 1.0.0
   */
  public function echoJavaScript();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos the meta tags within the HTML document.
   *
   * @api
   * @since 1.0.0
   */
  public function echoMetaTags();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos the HTML element for the page title.
   *
   * @see appendPageTitle()
   * @see getPageTitle()
   * @see setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function echoPageTitle();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the page title.
   *
   * @return string
   *
   * @see appendPageTitle()
   * @see echoPageTitle()
   * @see setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function getPageTitle();

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Using RequiresJS calls a function in the same namespace as the PHP class (where backslashes will be translated to
   * forward slashes). Example:
   * ```
   * $this->jsAdmPageSpecificFunctionCall(__CLASS__, 'init');
   * ```
   *
   * @param string $className      The PHP class name, i.e. __CLASS__. Backslashes will be translated to forward slashes
   *                               to construct the namespace.
   * @param string $jsFunctionName The function name inside the namespace.
   * @param array  $args           The optional arguments for the function.
   *
   * @api
   * @since 1.0.0
   */
  public function jsAdmClassSpecificFunctionCall($className, $jsFunctionName, $args = []);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Using RequiresJS calls a function in a namespace.
   *
   * @param string $namespace      The namespace as in RequireJS.
   * @param string $jsFunctionName The function name inside the namespace.
   * @param array  $args           The optional arguments for the function.
   *
   * @api
   * @since 1.0.0
   */
  public function jsAdmFunctionCall($namespace, $jsFunctionName, $args = []);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Do not use this function, use {@link jsAdmFunctionCall} instead.
   *
   * @param string $namespace      The namespace as in RequireJS.
   * @param string $jsFunctionName The function name inside the namespace.
   * @param array  $args           The optional arguments for the function.
   */
  public function jsAdmOptimizedFunctionCall($namespace, $jsFunctionName, $args = []);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Do not use this function, use {@link jsAdmSetPageSpecificMain} instead.
   * ```
   * $this->jsAdmSetPageSpecificMain(__CLASS__);
   * ```
   *
   * @param string $mainJsScript The main script for RequireJS.
   */
  public function jsAdmOptimizedSetPageSpecificMain($mainJsScript);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets a page specific main for RequireJS. Example:
   * ```
   * $this->jsAdmSetPageSpecificMain(__CLASS__);
   * ```
   *
   * @param string $className The PHP cass name, i.e. __CLASS__. Backslashes will be translated to forward slashes to
   *                          construct the namespace.
   *
   * @api
   * @since 1.0.0
   */
  public function jsAdmSetPageSpecificMain($className);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a meta element to this page.
   *
   * @param array $attributes The attributes of the meta element.
   *
   * @api
   * @since 1.0.0
   */
  public function metaAddElement($attributes);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a keyword to the keywords to be included in the keyword meta element of this page.
   *
   * @param string $keyword The keyword.
   *
   * @api
   * @since 1.0.0
   */
  public function metaAddKeyword($keyword);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds keywords to the keywords to be included in the keyword meta element of the page.
   *
   * @param string[] $keywords The keywords.
   *
   * @api
   * @since 1.0.0
   */
  public function metaAddKeywords($keywords);

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets title of the page.
   *
   * @param string|null $pageTitle The new title of the page.
   *
   * @see appendPageTitle()
   * @see echoPageTitle()
   * @see getPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function setPageTitle($pageTitle);

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
