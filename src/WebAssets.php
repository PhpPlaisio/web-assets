<?php
declare(strict_types=1);

namespace Plaisio\WebAssets;

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
   * @see   echoPageTitle()
   * @see   getPageTitle()
   * @see   setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function appendPageTitle(?string $pageTitleAddendum): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a line with a CSS snippet to the internal CSS.
   *
   * @param string|null $cssLine The line with CSS snippet.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendLine(?string $cssLine): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a CCS file to the header to the page.
   *
   * @param string      $location The location to the CSS source. One of:
   *                              <ul>
   *                              <li> A relative of absolute URL.
   *                              <li> The __CLASS__ or __TRAIT__ magical constant.
   *                              <li> Name of a class with specified by the ::class resolution operator.
   *                              </ul>
   *                              When a class name is given, backslashes will be translated to forward slashes to
   *                              construct the filename relative to the resource root of the CSS source.
   * @param string|null $media    The media for which the CSS source is optimized for. Note: use null for 'all' devices;
   *                              null is preferred over 'all'.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendSource(string $location, ?string $media = null): void;

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
  public function cssOptimizedAppendSource(string $url, ?string $media = null): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos the links to external and internal CSS.
   *
   * @api
   * @since 1.0.0
   */
  public function echoCascadingStyleSheets(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos JavaScript code that will be executed using RequireJS.
   *
   * @api
   * @since 1.0.0
   */
  public function echoJavaScript(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos the meta tags within the HTML document.
   *
   * @api
   * @since 1.0.0
   */
  public function echoMetaTags(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Echos the HTML element for the page title.
   *
   * @see   appendPageTitle()
   * @see   getPageTitle()
   * @see   setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function echoPageTitle(): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the page title.
   *
   * @return string
   *
   * @see   appendPageTitle()
   * @see   echoPageTitle()
   * @see   setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function getPageTitle(): string;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Using RequiresJS calls a function in a namespace.
   *
   * @param string $name           One of:
   *                               <ul>
   *                               <li> The namespace as in RequireJS as a single or double quoted string literal.
   *                               <li> The __CLASS__ or __TRAIT__ magical constant.
   *                               <li> Name of a class specified by the ::class resolution operator.
   *                               </ul>
   *                               When a class name is given, backslashes will be translated to forward slashes to
   *                               construct the namespace as in RequireJS.
   * @param string $jsFunctionName The function name inside the namespace.
   * @param array  $args           The optional arguments for the function.
   *
   * @api
   * @since 1.0.0
   */
  public function jsAdmFunctionCall(string $name, string $jsFunctionName, array $args = []): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Do not use this function, use {@link jsAdmFunctionCall} instead.
   *
   * @param string $namespace      The namespace as in RequireJS.
   * @param string $jsFunctionName The function name inside the namespace.
   * @param array  $args           The optional arguments for the function.
   */
  public function jsAdmOptimizedFunctionCall(string $namespace, string $jsFunctionName, array $args = []): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Do not use this function, use {@link jsAdmSetPageSpecificMain} instead.
   * ```
   * $this->jsAdmSetPageSpecificMain(__CLASS__);
   * ```
   *
   * @param string $mainJsScript The main script for RequireJS.
   */
  public function jsAdmOptimizedSetPageSpecificMain(string $mainJsScript): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets a page specific main for RequireJS. Example:
   * ```
   * $this->jsAdmSetPageSpecificMain(__CLASS__);
   * ```
   *
   * @param string $name One of:
   *                          <ul>
   *                          <li> The namespace as in RequireJS as a single or double quoted string literal.
   *                          <li> The __CLASS__ or __TRAIT__ magical constant.
   *                          <li> Name of a class specified by the ::class resolution operator.
   *                          </ul>
   *                          When a class name is given, backslashes will be translated to forward slashes to
   *                          construct the namespace as in RequireJS.
   *
   * @api
   * @since 1.0.0
   */
  public function jsAdmSetPageSpecificMain(string $name): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a meta element to this page.
   *
   * @param array $attributes The attributes of the meta element.
   *
   * @api
   * @since 1.0.0
   */
  public function metaAddElement(array $attributes): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a keyword to the keywords to be included in the keyword meta element of this page.
   *
   * @param string $keyword The keyword.
   *
   * @api
   * @since 1.0.0
   */
  public function metaAddKeyword(string $keyword): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds keywords to the keywords to be included in the keyword meta element of the page.
   *
   * @param string[] $keywords The keywords.
   *
   * @api
   * @since 1.0.0
   */
  public function metaAddKeywords(array $keywords): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets title of the page.
   *
   * @param string|null $pageTitle The new title of the page.
   *
   * @see   appendPageTitle()
   * @see   echoPageTitle()
   * @see   getPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function setPageTitle(?string $pageTitle): void;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
