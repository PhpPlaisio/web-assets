<?php

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
  public function appendPageTitle(?string $pageTitleAddendum): void;

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
  public function cssAppendClassSpecificSource(string $className, ?string $media = null): void;

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
   * @param string      $url   The URL to the CSS source.
   * @param string|null $media The media for which the CSS source is optimized for. Note: use null for 'all' devices;
   *                           null is preferred over 'all'.
   *
   * @api
   * @since 1.0.0
   */
  public function cssAppendSource(string $url, ?string $media = null): void;

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
  public function cssClassNameToRootRelativeUrl(string $className, ?string $media = null): string;

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
   * @see appendPageTitle()
   * @see getPageTitle()
   * @see setPageTitle()
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
   * @see appendPageTitle()
   * @see echoPageTitle()
   * @see setPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function getPageTitle(): string;

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
  public function jsAdmClassSpecificFunctionCall(string $className, string $jsFunctionName, array $args = []): void;

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
  public function jsAdmFunctionCall(string $namespace, string $jsFunctionName, array $args = []): void;

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
   * @param string $className The PHP cass name, i.e. __CLASS__. Backslashes will be translated to forward slashes to
   *                          construct the namespace.
   *
   * @api
   * @since 1.0.0
   */
  public function jsAdmSetPageSpecificMain(string $className): void;

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
   * @see appendPageTitle()
   * @see echoPageTitle()
   * @see getPageTitle()
   *
   * @api
   * @since 1.0.0
   */
  public function setPageTitle(?string $pageTitle): void;

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
