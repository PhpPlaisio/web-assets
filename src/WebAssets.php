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
   * @param string|null $postfix The string to be append to the page title.
   *
   * @see   echoPageTitle()
   * @see   getPageTitle()
   * @see   pushPageTitle()
   * @see   setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function appendPageTitle(?string $postfix): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Appends a line with a CSS snippet at the end of the internal CSS.
   *
   * @param string|null $cssLine The line with CSS snippet.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendLine(?string $cssLine): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Appends a CCS file at the end of the list of CSS files in the header of the page.
   *
   * @param string      $location The location to the CSS source. One of:
   *                              <ul>
   *                              <li> A relative of absolute URL.
   *                              <li> The __CLASS__ or __TRAIT__ magical constant.
   *                              <li> Name of a class specified by the ::class resolution operator.
   *                              </ul>
   *                              When a class name is given, backslashes will be translated to forward slashes and
   *                              extension .css will be added to construct the filename relative to the resource root
   *                              of CSS sources.
   * @param string|null $media    The media for which the CSS source is optimized for. Note: use null for 'all'
   *                              devices;
   *                              null is preferred over 'all'.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendSource(string $location, ?string $media = null): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Appends a list of CCS files at the end of the list of CSS files in the header of the page.
   *
   * @param string      $location The location to the CSS source. One of:
   *                              <ul>
   *                              <li> A relative URL.
   *                              <li> The __CLASS__ or __TRAIT__ magical constant.
   *                              <li> Name of a class specified by the ::class resolution operator.
   *                              </ul>
   *                              When a class name is given, backslashes will be translated to forward slashes and
   *                              extension .txt will be added to construct the filename relative to the resource root.
   * @param string|null $media    The media for which the CSS source is optimized for. Note: use null for 'all'
   *                              devices; null is preferred over 'all'.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendSourcesList(string $location, ?string $media = null): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Appends an optimized CCS file at the end of the list of CSS files in the header of the page.
   *
   * Do not use this method directly. Use {@link cssAppendSource} instead.
   *
   * @param string      $url   The URL to the CSS source.
   * @param string|null $media The media for which the CSS source is optimized for. Note: use null for 'all'
   *                           devices; null is preferred over 'all'.
   */
  public function cssOptimizedAppendSource(string $url, ?string $media = null): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Pushes an optimized CCS file at the beginning of the list of CSS files in the header of the page.
   *
   * Do not use this method directly. Use {@link cssPushSource} instead.
   *
   * @param string      $url   The URL to the CSS source.
   * @param string|null $media The media for which the CSS source is optimized for. Note: use null for 'all'
   *                           devices; null is preferred over 'all'.
   */
  public function cssOptimizedPushSource(string $url, ?string $media = null): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Pushes a line with a CSS snippet at the beginning of the internal CSS.
   *
   * @param string|null $cssLine The line with CSS snippet.
   *
   * @api
   * @since 2.0.0
   */
  public function cssPushLine(?string $cssLine): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Pushes a CCS file at the beginning of the list of CSS files in the header of the page.
   *
   * @param string      $location The location to the CSS source. One of:
   *                              <ul>
   *                              <li> A relative of absolute URL.
   *                              <li> The __CLASS__ or __TRAIT__ magical constant.
   *                              <li> Name of a class with specified by the ::class resolution operator.
   *                              </ul>
   *                              When a class name is given, backslashes will be translated to forward slashes and
   *                              extension .css will be added to construct the filename relative to the resource root
   *                              of CSS sources.
   * @param string|null $media    The media for which the CSS source is optimized for. Note: use null for 'all'
   *                              devices;
   *                              null is preferred over 'all'.
   *
   * @api
   * @since 2.0.0
   */
  public function cssPushSource(string $location, ?string $media = null): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Pushes a CCS list of files at the beginning of the list of CSS files in the header of the page.
   *
   * @param string      $location The location to the CSS source. One of:
   *                              <ul>
   *                              <li> A filename relative to the resource root with extension .txt.
   *                              <li> The __CLASS__ or __TRAIT__ magical constant.
   *                              <li> Name of a class specified by the ::class resolution operator.
   *                              </ul>
   *                              When a class name is given, backslashes will be translated to forward slashes and
   *                              extension .txt will be added to construct the filename relative to the resource root
   *                              of CSS sources.
   * @param string|null $media    The media for which the CSS sources are optimized for. Note: use null for 'all'
   *                              devices; null is preferred over 'all'.
   *
   * @api
   * @since 2.0.0
   */
  public function cssPushSourcesList(string $location, ?string $media = null): void;

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
   * @see   pushPageTitle()
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
   * @see   pushPageTitle()
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
  public function jsAdmOptimizedSetMain(string $mainJsScript): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets a main for RequireJS. Example:
   * ```
   * $this->jsAdmSetMain(__CLASS__);
   * ```
   *
   * @param string $name      One of:
   *                          <ul>
   *                          <li> The namespace as in RequireJS as a single or double quoted string literal.
   *                          <li> The __CLASS__ or __TRAIT__ magical constant.
   *                          <li> Name of a class specified by the ::class resolution operator.
   *                          </ul>
   *                          When a class name is given, backslashes will be translated to forward slashes to
   *                          construct the namespace as in RequireJS.
   *
   * @api
   * @since 2.0.0
   */
  public function jsAdmSetMain(string $name): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets a main for RequireJS. Example:
   * ```
   * $this->jsAdmSetPageSpecificMain(__CLASS__);
   * ```
   *
   * @param string $location  One of:
   *                          <ul>
   *                          <li> The namespace as in RequireJS as a single or double quoted string literal.
   *                          <li> The __CLASS__ or __TRAIT__ magical constant.
   *                          <li> Name of a class specified by the ::class resolution operator.
   *                          </ul>
   *                          When a class name is given, backslashes will be translated to forward slashes to
   *                          construct the namespace as in RequireJS.
   *
   * @deprecated Use {@see jsAdmSetMain} instead.
   */
  public function jsAdmSetPageSpecificMain(string $location): void;

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
   * Pushes with a separator a string to the page title.
   *
   * @param string|null $prefix The string to be prepended to the page title.
   *
   * @see   appendPageTitle()
   * @see   echoPageTitle()
   * @see   getPageTitle()
   * @see   setPageTitle()
   *
   * @api
   * @since 2.0.0
   */
  public function pushPageTitle(?string $prefix): void;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets the title of the page.
   *
   * @param string|null $title The new title of the page.
   *
   * @see   appendPageTitle()
   * @see   echoPageTitle()
   * @see   getPageTitle()
   * @see   pushPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function setPageTitle(?string $title): void;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
