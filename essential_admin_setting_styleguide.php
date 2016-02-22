<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Style guide.
 *
 * @package    theme
 * @subpackage essential
 * @copyright  &copy; 2016-onwards G J Barnard.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}
 * @license    PHP Code: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    HTML Code: http://www.apache.org/licenses/LICENSE-2.0 Apache License v2.0.
 * @license    Content: http://creativecommons.org/licenses/by/3.0/ Creative Commons Attribution 3.0 Unported (CC BY 3.0).
 *
 * Content source reference: http://getbootstrap.com/2.3.2/base-css.html.
 */
class essential_admin_setting_styleguide extends admin_setting {

    /**
     * Constructor
     *
     * @param string $name unique ascii name, either 'mysetting' for settings that in config, or 'myplugin/mysetting' for ones in config_plugins.
     * @param string $visiblename localised
     * @param string $description long localised info
     */
    public function __construct($name, $visiblename, $description) {
        $this->nosave = true;

        global $PAGE;
        if ($PAGE->bodyid == 'page-admin-setting-' . $name) {
            $bc = new block_contents();
            $bc->title = get_string('styleguide', 'theme_essential');
            $bc->attributes['class'] = 'block';
            $bc->content = '<ul class="nav nav-list bs-docs-sidenav">
<li><a href="#typography"><i class="icon-chevron-right"></i> Typography</a></li>
<li><a href="#code"><i class="icon-chevron-right"></i> Code</a></li>
<li><a href="#tables"><i class="icon-chevron-right"></i> Tables</a></li>
<li><a href="#forms"><i class="icon-chevron-right"></i> Forms</a></li>
<li><a href="#buttons"><i class="icon-chevron-right"></i> Buttons</a></li>
<li><a href="#images"><i class="icon-chevron-right"></i> Images</a></li>
</ul>';
            $defaultregion = $PAGE->blocks->get_default_region();
            $PAGE->blocks->add_fake_block($bc, $defaultregion);
        }

        parent::__construct($name, $visiblename, $description, '');
    }

    /**
     * Always returns true
     * @return bool Always returns true
     */
    public function get_setting() {
        return true;
    }

    /**
     * Always returns true
     * @return bool Always returns true
     */
    public function get_defaultsetting() {
        return true;
    }

    /**
     * Never write settings
     * @return string Always returns an empty string
     */
    public function write_setting($data) {
        // do not write any setting
        return '';
    }

    /**
     * Returns an HTML string
     * @return string Returns an HTML string
     */
    public function output_html($data, $query = '') {
        global $OUTPUT;
        $return = '';
        if ($this->visiblename != '') {
            $return .= $OUTPUT->heading($this->visiblename, 3, 'main');
        }
        if ($this->description != '') {
            $return .= $OUTPUT->box(highlight($query, markdown_to_html($this->description)),
                    'generalbox formsettingheading');
        }

        $return .= '        <!-- Typography';
        $return .= '================================================== -->';
        $return .= '<section id="typography">';
        $return .= '<div class="page-header">';
        $return .= '<h1>Typography</h1>';
        $return .= '</div>';

        $return .= '<h2 id="headings">Headings</h2>';
        $return .= '<p>All HTML headings, <code>&lt;h1&gt;</code> through <code>&lt;h6&gt;</code> are available.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<h1>h1. Heading 1</h1>';
        $return .= '<h2>h2. Heading 2</h2>';
        $return .= '<h3>h3. Heading 3</h3>';
        $return .= '<h4>h4. Heading 4</h4>';
        $return .= '<h5>h5. Heading 5</h5>';
        $return .= '<h6>h6. Heading 6</h6>';
        $return .= '</div>';

        $return .= '<h2 id="body-copy">Body copy</h2>';
        $return .= '<p>Bootstrap\'s global default <code>font-size</code> is <strong>14px</strong>, with a <code>line-height';
        $return .= '</code> of <strong>20px</strong>. This is applied to the <code>&lt;body&gt;</code> and all paragraphs.';
        $return .= 'In addition, <code>&lt;p&gt;</code> (paragraphs) receive a bottom margin of half their line-height ';
        $return .= '(10px by default).</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis ';
        $return .= 'dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>';
        $return .= '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ';
        $return .= 'ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat ';
        $return .= 'porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p>';
        $return .= '<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta ';
        $return .= 'gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia ';
        $return .= 'odio sem nec elit.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint">&lt;p&gt;...&lt;/p&gt;</pre>';

        $return .= '<h3>Lead body copy</h3>';
        $return .= '<p>Make a paragraph stand out by adding <code>.lead</code>.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, ';
        $return .= 'est non commodo luctus.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint">&lt;p class="lead"&gt;...&lt;/p&gt;</pre>';

        $return .= '<h3>Built with Less</h3>';
        $return .= '<p>The typographic scale is based on two LESS variables in <strong>variables.less</strong>: <code>';
        $return .= '@baseFontSize</code> and <code>@baseLineHeight</code>. The first is the base font-size used throughout';
        $return .= 'and the second is the base line-height. We use those variables and some simple math to create the margins, ';
        $return .= 'paddings, and line-heights of all our type and more. Customize them and Bootstrap adapts.</p>';


        $return .= '<hr class="bs-docs-separator">';


        $return .= '<h2 id="emphasis">Emphasis</h2>';
        $return .= '<p>Make use of HTML\'s default emphasis tags with lightweight styles.</p>';

        $return .= '<h3><code>&lt;small&gt;</code></h3>';
        $return .= '<p>For de-emphasizing inline or blocks of text, <small>use the small tag.</small></p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p><small>This line of text is meant to be treated as fine print.</small></p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint">';
        $return .= '&lt;p&gt;';
        $return .= '&lt;small&gt;This line of text is meant to be treated as fine print.&lt;/small&gt;';
        $return .= '&lt;/p&gt;';
        $return .= '</pre>';

        $return .= '<h3>Bold</h3>';
        $return .= '<p>For emphasizing a snippet of text with a heavier font-weight.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p>The following snippet of text is <strong>rendered as bold text</strong>.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint">&lt;strong&gt;rendered as bold text&lt;/strong&gt;</pre>';

        $return .= '<h3>Italics</h3>';
        $return .= '<p>For emphasizing a snippet of text with italics.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p>The following snippet of text is <em>rendered as italicized text</em>.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint">&lt;em&gt;rendered as italicized text&lt;/em&gt;</pre>';

        $return .= '<p><span class="label label-info">Heads up!</span> Feel free to use <code>&lt;b&gt;</code> and <code>';
        $return .= '&lt;i&gt;</code> in HTML5. <code>&lt;b&gt;</code> is meant to highlight words or phrases without conveying';
        $return .= 'additional importance while <code>&lt;i&gt;</code> is mostly for voice, technical terms, etc.</p>';

        $return .= '<h3>Alignment classes</h3>';
        $return .= '<p>Easily realign text to components with text alignment classes.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p class="text-left">Left aligned text.</p>';
        $return .= '<p class="text-center">Center aligned text.</p>';
        $return .= '<p class="text-right">Right aligned text.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;p class="text-left"&gt;Left aligned text.&lt;/p&gt;';
        $return .= '&lt;p class="text-center"&gt;Center aligned text.&lt;/p&gt;';
        $return .= '&lt;p class="text-right"&gt;Right aligned text.&lt;/p&gt;';
        $return .= '</pre>';

        $return .= '<h3>Emphasis classes</h3>';
        $return .= '<p>Convey meaning through color with a handful of emphasis utility classes.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p class="muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>';
        $return .= '<p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>';
        $return .= '<p class="text-error">Donec ullamcorper nulla non metus auctor fringilla.</p>';
        $return .= '<p class="text-info">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>';
        $return .= '<p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;p class="muted"&gt;Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.&lt;/p&gt;';
        $return .= '&lt;p class="text-warning"&gt;Etiam porta sem malesuada magna mollis euismod.&lt;/p&gt;';
        $return .= '&lt;p class="text-error"&gt;Donec ullamcorper nulla non metus auctor fringilla.&lt;/p&gt;';
        $return .= '&lt;p class="text-info"&gt;Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.&lt;/p&gt;';
        $return .= '&lt;p class="text-success"&gt;Duis mollis, est non commodo luctus, nisi erat porttitor ligula.&lt;/p&gt;';
        $return .= '</pre>';

        $return .= '<hr class="bs-docs-separator">';

        $return .= '<h2 id="abbreviations">Abbreviations</h2>';
        $return .= '<p>Stylized implementation of HTML\'s <code>&lt;abbr&gt;</code> element for abbreviations and acronyms to ';
        $return .= 'show the expanded version on hover. Abbreviations with a <code>title</code> attribute have a light dotted ';
        $return .= 'bottom border and a help cursor on hover, providing additional context on hover.</p>';

        $return .= '<h3><code>&lt;abbr&gt;</code></h3>';
        $return .= '<p>For expanded text on long hover of an abbreviation, include the <code>title</code> attribute.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint">&lt;abbr title="attribute"&gt;attr&lt;/abbr&gt;</pre>';

        $return .= '<h3><code>&lt;abbr class="initialism"&gt;</code></h3>';
        $return .= '<p>Add <code>.initialism</code> to an abbreviation for a slightly smaller font-size.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<p><abbr title="HyperText Markup Language" class="initialism">HTML</abbr> is the best thing since sliced ';
        $return .= 'bread.</p>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint">&lt;abbr title="HyperText Markup Language" class="initialism"&gt;HTML&lt;/abbr&gt;';
        $return .= '</pre>';

        $return .= '<hr class="bs-docs-separator">';

        $return .= '<h2 id="addresses">Addresses</h2>';
        $return .= '<p>Present contact information for the nearest ancestor or the entire body of work.</p>';

        $return .= '<h3><code>&lt;address&gt;</code></h3>';
        $return .= '<p>Preserve formatting by ending all lines with <code>&lt;br&gt;</code>.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<address>';
        $return .= '<strong>Twitter, Inc.</strong><br>';
        $return .= '795 Folsom Ave, Suite 600<br>';
        $return .= 'San Francisco, CA 94107<br>';
        $return .= '<abbr title="Phone">P:</abbr> (123) 456-7890';
        $return .= '</address>';
        $return .= '<address>';
        $return .= '<strong>Full Name</strong><br>';
        $return .= '<a href="mailto:#">first.last@example.com</a>';
        $return .= '</address>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;address&gt;';
        $return .= '  &lt;strong&gt;Twitter, Inc.&lt;/strong&gt;&lt;br&gt;';
        $return .= '  795 Folsom Ave, Suite 600&lt;br&gt;';
        $return .= '  San Francisco, CA 94107&lt;br&gt;';
        $return .= '  &lt;abbr title="Phone"&gt;P:&lt;/abbr&gt; (123) 456-7890';
        $return .= '&lt;/address&gt;';

        $return .= '&lt;address&gt;';
        $return .= '  &lt;strong&gt;Full Name&lt;/strong&gt;&lt;br&gt;';
        $return .= '  &lt;a href="mailto:#"&gt;first.last@example.com&lt;/a&gt;';
        $return .= '&lt;/address&gt;';
        $return .= '</pre>';

        $return .= '<hr class="bs-docs-separator">';

        $return .= '<h2 id="blockquotes">Blockquotes</h2>';
        $return .= '<p>For quoting blocks of content from another source within your document.</p>';

        $return .= '<h3>Default blockquote</h3>';
        $return .= '<p>Wrap <code>&lt;blockquote&gt;</code> around any <abbr title="HyperText Markup Language">HTML</abbr> ';
        $return .= 'as the quote. For straight quotes we recommend a <code>&lt;p&gt;</code>.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<blockquote>';
        $return .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>';
        $return .= '</blockquote>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;blockquote&gt;';
        $return .= '  &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.&lt;/p&gt;';
        $return .= '&lt;/blockquote&gt;';
        $return .= '</pre>';

        $return .= '<h3>Blockquote options</h3>';
        $return .= '<p>Style and content changes for simple variations on a standard blockquote.</p>';

        $return .= '<h4>Naming a source</h4>';
        $return .= '<p>Add <code>&lt;small&gt;</code> tag for identifying the source. Wrap the name of the source work in <code>';
        $return .= '&lt;cite&gt;</code>.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<blockquote>';
        $return .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>';
        $return .= '<small>Someone famous in <cite title="Source Title">Source Title</cite></small>';
        $return .= '</blockquote>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;blockquote&gt;';
        $return .= '  &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.&lt;/p&gt;';
        $return .= '  &lt;small&gt;Someone famous &lt;cite title="Source Title"&gt;Source Title&lt;/cite&gt;&lt;/small&gt;';
        $return .= '&lt;/blockquote&gt;';
        $return .= '</pre>';

        $return .= '<h4>Alternate displays</h4>';
        $return .= '<p>Use <code>.pull-right</code> for a floated, right-aligned blockquote.</p>';
        $return .= '<div class="bs-docs-example" style="overflow: hidden;">';
        $return .= '<blockquote class="pull-right">';
        $return .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>';
        $return .= '<small>Someone famous in <cite title="Source Title">Source Title</cite></small>';
        $return .= '</blockquote>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;blockquote class="pull-right"&gt;';
        $return .= '  ...';
        $return .= '&lt;/blockquote&gt;';
        $return .= '</pre>';

        $return .= '<hr class="bs-docs-separator">';

        $return .= '<!-- Lists -->';
        $return .= '<h2 id="lists">Lists</h2>';

        $return .= '<h3>Unordered</h3>';
        $return .= '<p>A list of items in which the order does <em>not</em> explicitly matter.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<ul>';
        $return .= '<li>Lorem ipsum dolor sit amet</li>';
        $return .= '<li>Consectetur adipiscing elit</li>';
        $return .= '<li>Integer molestie lorem at massa</li>';
        $return .= '<li>Facilisis in pretium nisl aliquet</li>';
        $return .= '<li>Nulla volutpat aliquam velit';
        $return .= '<ul>';
        $return .= '<li>Phasellus iaculis neque</li>';
        $return .= '<li>Purus sodales ultricies</li>';
        $return .= '<li>Vestibulum laoreet porttitor sem</li>';
        $return .= '<li>Ac tristique libero volutpat at</li>';
        $return .= '</ul>';
        $return .= '</li>';
        $return .= '<li>Faucibus porta lacus fringilla vel</li>';
        $return .= '<li>Aenean sit amet erat nunc</li>';
        $return .= '<li>Eget porttitor lorem</li>';
        $return .= '</ul>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;ul&gt;';
        $return .= '  &lt;li&gt;...&lt;/li&gt;';
        $return .= '&lt;/ul&gt;';
        $return .= '</pre>';

        $return .= '<h3>Ordered</h3>';
        $return .= '<p>A list of items in which the order <em>does</em> explicitly matter.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<ol>';
        $return .= '<li>Lorem ipsum dolor sit amet</li>';
        $return .= '<li>Consectetur adipiscing elit</li>';
        $return .= '<li>Integer molestie lorem at massa</li>';
        $return .= '<li>Facilisis in pretium nisl aliquet</li>';
        $return .= '<li>Nulla volutpat aliquam velit</li>';
        $return .= '<li>Faucibus porta lacus fringilla vel</li>';
        $return .= '<li>Aenean sit amet erat nunc</li>';
        $return .= '<li>Eget porttitor lorem</li>';
        $return .= '</ol>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;ol&gt;';
        $return .= '  &lt;li&gt;...&lt;/li&gt;';
        $return .= '&lt;/ol&gt;';
        $return .= '</pre>';

        $return .= '<h3>Unstyled</h3>';
        $return .= '<p>Remove the default <code>list-style</code> and left padding on list items (immediate children only).</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<ul class="unstyled">';
        $return .= '<li>Lorem ipsum dolor sit amet</li>';
        $return .= '<li>Consectetur adipiscing elit</li>';
        $return .= '<li>Integer molestie lorem at massa</li>';
        $return .= '<li>Facilisis in pretium nisl aliquet</li>';
        $return .= '<li>Nulla volutpat aliquam velit';
        $return .= '<ul>';
        $return .= '<li>Phasellus iaculis neque</li>';
        $return .= '<li>Purus sodales ultricies</li>';
        $return .= '<li>Vestibulum laoreet porttitor sem</li>';
        $return .= '<li>Ac tristique libero volutpat at</li>';
        $return .= '</ul>';
        $return .= '</li>';
        $return .= '<li>Faucibus porta lacus fringilla vel</li>';
        $return .= '<li>Aenean sit amet erat nunc</li>';
        $return .= '<li>Eget porttitor lorem</li>';
        $return .= '</ul>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;ul class="unstyled"&gt;';
        $return .= '  &lt;li&gt;...&lt;/li&gt;';
        $return .= '&lt;/ul&gt;';
        $return .= '</pre>';

        $return .= '<h3>Inline</h3>';
        $return .= '<p>Place all list items on a single line with <code>inline-block</code> and some light padding.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<ul class="inline">';
        $return .= '<li>Lorem ipsum</li>';
        $return .= '<li>Phasellus iaculis</li>';
        $return .= '<li>Nulla volutpat</li>';
        $return .= '</ul>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;ul class="inline"&gt;';
        $return .= '  &lt;li&gt;...&lt;/li&gt;';
        $return .= '&lt;/ul&gt;';
        $return .= '</pre>';

        $return .= '<h3>Description</h3>';
        $return .= '<p>A list of terms with their associated descriptions.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<dl>';
        $return .= '<dt>Description lists</dt>';
        $return .= '<dd>A description list is perfect for defining terms.</dd>';
        $return .= '<dt>Euismod</dt>';
        $return .= '<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>';
        $return .= '<dd>Donec id elit non mi porta gravida at eget metus.</dd>';
        $return .= '<dt>Malesuada porta</dt>';
        $return .= '<dd>Etiam porta sem malesuada magna mollis euismod.</dd>';
        $return .= '</dl>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;dl&gt;';
        $return .= '  &lt;dt&gt;...&lt;/dt&gt;';
        $return .= '  &lt;dd&gt;...&lt;/dd&gt;';
        $return .= '&lt;/dl&gt;';
        $return .= '</pre>';

        $return .= '<h4>Horizontal description</h4>';
        $return .= '<p>Make terms and descriptions in <code>&lt;dl&gt;</code> line up side-by-side.</p>';
        $return .= '<div class="bs-docs-example">';
        $return .= '<dl class="dl-horizontal">';
        $return .= '<dt>Description lists</dt>';
        $return .= '<dd>A description list is perfect for defining terms.</dd>';
        $return .= '<dt>Euismod</dt>';
        $return .= '<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>';
        $return .= '<dd>Donec id elit non mi porta gravida at eget metus.</dd>';
        $return .= '<dt>Malesuada porta</dt>';
        $return .= '<dd>Etiam porta sem malesuada magna mollis euismod.</dd>';
        $return .= '<dt>Felis euismod semper eget lacinia</dt>';
        $return .= '<dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit ';
        $return .= 'amet risus.</dd>';
        $return .= '</dl>';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;dl class="dl-horizontal"&gt;';
        $return .= '  &lt;dt&gt;...&lt;/dt&gt;';
        $return .= '  &lt;dd&gt;...&lt;/dd&gt;';
        $return .= '&lt;/dl&gt;';
        $return .= '</pre>';
        $return .= '<p>';
        $return .= '<span class="label label-info">Heads up!</span>';
        $return .= 'Horizontal description lists will truncate terms that are too long to fit in the left column fix <code>';
        $return .= 'text-overflow</code>. In narrower viewports, they will change to the default stacked layout.';
        $return .= '</p>';
        $return .= '</section>';

        $return .= '<!-- Code
        ================================================== -->
        <section id="code">
          <div class="page-header">
            <h1>Code</h1>
          </div>

          <h2>Inline</h2>
          <p>Wrap inline snippets of code with <code>&lt;code&gt;</code>.</p>
<div class="bs-docs-example">
  For example, <code>&lt;section&gt;</code> should be wrapped as inline.
</div>
<pre class="prettyprint linenums">
For example, &lt;code&gt;&amp;lt;section&amp;gt;&lt;/code&gt; should be wrapped as inline.
</pre>

          <h2>Basic block</h2>
          <p>Use <code>&lt;pre&gt;</code> for multiple lines of code. Be sure to escape any angle brackets in the code for proper rendering.</p>
<div class="bs-docs-example">
  <pre>&lt;p&gt;Sample text here...&lt;/p&gt;</pre>
</div>
<pre class="prettyprint linenums" style="margin-bottom: 9px;">
&lt;pre&gt;
  &amp;lt;p&amp;gt;Sample text here...&amp;lt;/p&amp;gt;
&lt;/pre&gt;
</pre>
          <p><span class="label label-info">Heads up!</span> Be sure to keep code within <code>&lt;pre&gt;</code> tags as close to the left as possible; it will render all tabs.</p>
          <p>You may optionally add the <code>.pre-scrollable</code> class which will set a max-height of 350px and provide a y-axis scrollbar.</p>
        </section>';

        $return .= '<!-- Tables
        ================================================== -->
        <section id="tables">
          <div class="page-header">
            <h1>Tables</h1>
          </div>

          <h2>Default styles</h2>
          <p>For basic styling&mdash;light padding and only horizontal dividers&mdash;add the base class <code>.table</code> to any <code>&lt;table&gt;</code>.</p>
          <div class="bs-docs-example">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
<pre class="prettyprint linenums">
&lt;table class="table"&gt;
  …
&lt;/table&gt;
</pre>


          <hr class="bs-docs-separator">


          <h2>Optional classes</h2>
          <p>Add any of the following classes to the <code>.table</code> base class.</p>

          <h3><code>.table-striped</code></h3>
          <p>Adds zebra-striping to any table row within the <code>&lt;tbody&gt;</code> via the <code>:nth-child</code> CSS selector (not available in IE7-8).</p>
          <div class="bs-docs-example">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
<pre class="prettyprint linenums" style="margin-bottom: 18px;">
&lt;table class="table table-striped"&gt;
  …
&lt;/table&gt;
</pre>

          <h3><code>.table-bordered</code></h3>
          <p>Add borders and rounded corners to the table.</p>
          <div class="bs-docs-example">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="2">1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@TwBootstrap</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
<pre class="prettyprint linenums">
&lt;table class="table table-bordered"&gt;
  …
&lt;/table&gt;
</pre>

          <h3><code>.table-hover</code></h3>
          <p>Enable a hover state on table rows within a <code>&lt;tbody&gt;</code>.</p>
          <div class="bs-docs-example">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
<pre class="prettyprint linenums" style="margin-bottom: 18px;">
&lt;table class="table table-hover"&gt;
  …
&lt;/table&gt;
</pre>

          <h3><code>.table-condensed</code></h3>
          <p>Makes tables more compact by cutting cell padding in half.</p>
          <div class="bs-docs-example">
            <table class="table table-condensed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
<pre class="prettyprint linenums" style="margin-bottom: 18px;">
&lt;table class="table table-condensed"&gt;
  …
&lt;/table&gt;
</pre>


          <hr class="bs-docs-separator">


          <h2>Optional row classes</h2>
          <p>Use contextual classes to color table rows.</p>
          <table class="table table-bordered table-striped">
            <colgroup>
              <col class="span1">
              <col class="span7">
            </colgroup>
            <thead>
              <tr>
                <th>Class</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <code>.success</code>
                </td>
                <td>Indicates a successful or positive action.</td>
              </tr>
              <tr>
                <td>
                  <code>.error</code>
                </td>
                <td>Indicates a dangerous or potentially negative action.</td>
              </tr>
              <tr>
                <td>
                  <code>.warning</code>
                </td>
                <td>Indicates a warning that might need attention.</td>
              </tr>
              <tr>
                <td>
                  <code>.info</code>
                </td>
                <td>Used as an alternative to the default styles.</td>
              </tr>
            </tbody>
          </table>
          <div class="bs-docs-example">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Payment Taken</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr class="success">
                  <td>1</td>
                  <td>TB - Monthly</td>
                  <td>01/04/2012</td>
                  <td>Approved</td>
                </tr>
                <tr class="error">
                  <td>2</td>
                  <td>TB - Monthly</td>
                  <td>02/04/2012</td>
                  <td>Declined</td>
                </tr>
                <tr class="warning">
                  <td>3</td>
                  <td>TB - Monthly</td>
                  <td>03/04/2012</td>
                  <td>Pending</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
              </tbody>
            </table>
          </div>
<pre class="prettyprint linenums">
...
  &lt;tr class="success"&gt;
    &lt;td&gt;1&lt;/td&gt;
    &lt;td&gt;TB - Monthly&lt;/td&gt;
    &lt;td&gt;01/04/2012&lt;/td&gt;
    &lt;td&gt;Approved&lt;/td&gt;
  &lt;/tr&gt;
...
</pre>


          <hr class="bs-docs-separator">


          <h2>Supported table markup</h2>
          <p>List of supported table HTML elements and how they should be used.</p>
          <table class="table table-bordered table-striped">
            <colgroup>
              <col class="span1">
              <col class="span7">
            </colgroup>
            <thead>
              <tr>
                <th>Tag</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <code>&lt;table&gt;</code>
                </td>
                <td>
                  Wrapping element for displaying data in a tabular format
                </td>
              </tr>
              <tr>
                <td>
                  <code>&lt;thead&gt;</code>
                </td>
                <td>
                  Container element for table header rows (<code>&lt;tr&gt;</code>) to label table columns
                </td>
              </tr>
              <tr>
                <td>
                  <code>&lt;tbody&gt;</code>
                </td>
                <td>
                  Container element for table rows (<code>&lt;tr&gt;</code>) in the body of the table
                </td>
              </tr>
              <tr>
                <td>
                  <code>&lt;tr&gt;</code>
                </td>
                <td>
                  Container element for a set of table cells (<code>&lt;td&gt;</code> or <code>&lt;th&gt;</code>) that appears on a single row
                </td>
              </tr>
              <tr>
                <td>
                  <code>&lt;td&gt;</code>
                </td>
                <td>
                  Default table cell
                </td>
              </tr>
              <tr>
                <td>
                  <code>&lt;th&gt;</code>
                </td>
                <td>
                  Special table cell for column (or row, depending on scope and placement) labels
                </td>
              </tr>
              <tr>
                <td>
                  <code>&lt;caption&gt;</code>
                </td>
                <td>
                  Description or summary of what the table holds, especially useful for screen readers
                </td>
              </tr>
            </tbody>
          </table>
<pre class="prettyprint linenums">
&lt;table&gt;
  &lt;caption&gt;...&lt;/caption&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th&gt;...&lt;/th&gt;
      &lt;th&gt;...&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;td&gt;...&lt;/td&gt;
      &lt;td&gt;...&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
</pre>

        </section>';

        $return .= '<!-- Forms
        ================================================== -->
        <section id="forms">
          <div class="page-header">
            <h1>Forms</h1>
          </div>

          <h2>Default styles</h2>
          <p>Individual form controls receive styling, but without any required base class on the <code>&lt;form&gt;</code> or large changes in markup. Results in stacked, left-aligned labels on top of form controls.</p>
          <form class="bs-docs-example">
            <fieldset>
              <legend>Legend</legend>
              <label>Label name</label>
              <input type="text" placeholder="Type something…">
              <span class="help-block">Example block-level help text here.</span>
              <label class="checkbox">
                <input type="checkbox"> Check me out
              </label>
              <button type="submit" class="btn">Submit</button>
            </fieldset>
          </form>
<pre class="prettyprint linenums">
&lt;form&gt;
  &lt;fieldset&gt;
    &lt;legend&gt;Legend&lt;/legend&gt;
    &lt;label&gt;Label name&lt;/label&gt;
    &lt;input type="text" placeholder="Type something…"&gt;
    &lt;span class="help-block"&gt;Example block-level help text here.&lt;/span&gt;
    &lt;label class="checkbox"&gt;
      &lt;input type="checkbox"&gt; Check me out
    &lt;/label&gt;
    &lt;button type="submit" class="btn"&gt;Submit&lt;/button&gt;
  &lt;/fieldset&gt;
&lt;/form&gt;
</pre>


          <hr class="bs-docs-separator">


          <h2>Optional layouts</h2>
          <p>Included with Bootstrap are three optional form layouts for common use cases.</p>

          <h3>Search form</h3>
          <p>Add <code>.form-search</code> to the form and <code>.search-query</code> to the <code>&lt;input&gt;</code> for an extra-rounded text input.</p>
          <form class="bs-docs-example form-search">
            <input type="text" class="input-medium search-query">
            <button type="submit" class="btn">Search</button>
          </form>
<pre class="prettyprint linenums">
&lt;form class="form-search"&gt;
  &lt;input type="text" class="input-medium search-query"&gt;
  &lt;button type="submit" class="btn"&gt;Search&lt;/button&gt;
&lt;/form&gt;
</pre>

          <h3>Inline form</h3>
          <p>Add <code>.form-inline</code> for left-aligned labels and inline-block controls for a compact layout.</p>
          <form class="bs-docs-example form-inline">
            <input type="text" class="input-small" placeholder="Email">
            <input type="password" class="input-small" placeholder="Password">
            <label class="checkbox">
              <input type="checkbox"> Remember me
            </label>
            <button type="submit" class="btn">Sign in</button>
          </form>
<pre class="prettyprint linenums">
&lt;form class="form-inline"&gt;
  &lt;input type="text" class="input-small" placeholder="Email"&gt;
  &lt;input type="password" class="input-small" placeholder="Password"&gt;
  &lt;label class="checkbox"&gt;
    &lt;input type="checkbox"&gt; Remember me
  &lt;/label&gt;
  &lt;button type="submit" class="btn"&gt;Sign in&lt;/button&gt;
&lt;/form&gt;
</pre>

          <h3>Horizontal form</h3>
          <p>Right align labels and float them to the left to make them appear on the same line as controls. Requires the most markup changes from a default form:</p>
          <ul>
            <li>Add <code>.form-horizontal</code> to the form</li>
            <li>Wrap labels and controls in <code>.control-group</code></li>
            <li>Add <code>.control-label</code> to the label</li>
            <li>Wrap any associated controls in <code>.controls</code> for proper alignment</li>
          </ul>
          <form class="bs-docs-example form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputEmail">Email</label>
              <div class="controls">
                <input type="text" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
                <input type="password" id="inputPassword" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox"> Remember me
                </label>
                <button type="submit" class="btn">Sign in</button>
              </div>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;form class="form-horizontal"&gt;
  &lt;div class="control-group"&gt;
    &lt;label class="control-label" for="inputEmail"&gt;Email&lt;/label&gt;
    &lt;div class="controls"&gt;
      &lt;input type="text" id="inputEmail" placeholder="Email"&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class="control-group"&gt;
    &lt;label class="control-label" for="inputPassword"&gt;Password&lt;/label&gt;
    &lt;div class="controls"&gt;
      &lt;input type="password" id="inputPassword" placeholder="Password"&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class="control-group"&gt;
    &lt;div class="controls"&gt;
      &lt;label class="checkbox"&gt;
        &lt;input type="checkbox"&gt; Remember me
      &lt;/label&gt;
      &lt;button type="submit" class="btn"&gt;Sign in&lt;/button&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/form&gt;
</pre>


          <hr class="bs-docs-separator">


          <h2>Supported form controls</h2>
          <p>Examples of standard form controls supported in an example form layout.</p>

          <h3>Inputs</h3>
          <p>Most common form control, text-based input fields. Includes support for all HTML5 types: text, password, datetime, datetime-local, date, month, time, week, number, email, url, search, tel, and color.</p>
          <p>Requires the use of a specified <code>type</code> at all times.</p>
          <form class="bs-docs-example form-inline">
            <input type="text" placeholder="Text input">
          </form>
<pre class="prettyprint linenums">
&lt;input type="text" placeholder="Text input"&gt;
</pre>

          <h3>Textarea</h3>
          <p>Form control which supports multiple lines of text. Change <code>rows</code> attribute as necessary.</p>
          <form class="bs-docs-example form-inline">
            <textarea rows="3"></textarea>
          </form>
<pre class="prettyprint linenums">
&lt;textarea rows="3"&gt;&lt;/textarea&gt;
</pre>

          <h3>Checkboxes and radios</h3>
          <p>Checkboxes are for selecting one or several options in a list while radios are for selecting one option from many.</p>
          <h4>Default (stacked)</h4>
          <form class="bs-docs-example">
            <label class="checkbox">
              <input type="checkbox" value="">
              Option one is this and that&mdash;be sure to include why it\'s great
            </label>
            <br>
            <label class="radio">
              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
              Option one is this and that&mdash;be sure to include why it\'s great
            </label>
            <label class="radio">
              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
              Option two can be something else and selecting it will deselect option one
            </label>
          </form>
<pre class="prettyprint linenums">
&lt;label class="checkbox"&gt;
  &lt;input type="checkbox" value=""&gt;
  Option one is this and that&mdash;be sure to include why it\'s great
&lt;/label&gt;

&lt;label class="radio"&gt;
  &lt;input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked&gt;
  Option one is this and that&mdash;be sure to include why it\'s great
&lt;/label&gt;
&lt;label class="radio"&gt;
  &lt;input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"&gt;
  Option two can be something else and selecting it will deselect option one
&lt;/label&gt;
</pre>

          <h4>Inline checkboxes</h4>
          <p>Add the <code>.inline</code> class to a series of checkboxes or radios for controls appear on the same line.</p>
          <form class="bs-docs-example">
            <label class="checkbox inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
            </label>
            <label class="checkbox inline">
              <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
            </label>
            <label class="checkbox inline">
              <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
            </label>
          </form>
<pre class="prettyprint linenums">
&lt;label class="checkbox inline"&gt;
  &lt;input type="checkbox" id="inlineCheckbox1" value="option1"&gt; 1
&lt;/label&gt;
&lt;label class="checkbox inline"&gt;
  &lt;input type="checkbox" id="inlineCheckbox2" value="option2"&gt; 2
&lt;/label&gt;
&lt;label class="checkbox inline"&gt;
  &lt;input type="checkbox" id="inlineCheckbox3" value="option3"&gt; 3
&lt;/label&gt;
</pre>

          <h3>Selects</h3>
          <p>Use the default option or specify a <code>multiple="multiple"</code> to show multiple options at once.</p>
          <form class="bs-docs-example">
            <select>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            <br>
            <select multiple="multiple">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </form>
<pre class="prettyprint linenums">
&lt;select&gt;
  &lt;option&gt;1&lt;/option&gt;
  &lt;option&gt;2&lt;/option&gt;
  &lt;option&gt;3&lt;/option&gt;
  &lt;option&gt;4&lt;/option&gt;
  &lt;option&gt;5&lt;/option&gt;
&lt;/select&gt;

&lt;select multiple="multiple"&gt;
  &lt;option&gt;1&lt;/option&gt;
  &lt;option&gt;2&lt;/option&gt;
  &lt;option&gt;3&lt;/option&gt;
  &lt;option&gt;4&lt;/option&gt;
  &lt;option&gt;5&lt;/option&gt;
&lt;/select&gt;
</pre>


          <hr class="bs-docs-separator">


          <h2>Extending form controls</h2>
          <p>Adding on top of existing browser controls, Bootstrap includes other useful form components.</p>

          <h3>Prepended and appended inputs</h3>
          <p>Add text or buttons before or after any text-based input. Do note that <code>select</code> elements are not supported here.</p>

          <h4>Default options</h4>
          <p>Wrap an <code>.add-on</code> and an <code>input</code> with one of two classes to prepend or append text to an input.</p>
          <form class="bs-docs-example">
            <div class="input-prepend">
              <span class="add-on">@</span>
              <input class="span2" id="prependedInput" type="text" placeholder="Username">
            </div>
            <br>
            <div class="input-append">
              <input class="span2" id="appendedInput" type="text">
              <span class="add-on">.00</span>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;div class="input-prepend"&gt;
  &lt;span class="add-on"&gt;@&lt;/span&gt;
  &lt;input class="span2" id="prependedInput" type="text" placeholder="Username"&gt;
&lt;/div&gt;
&lt;div class="input-append"&gt;
  &lt;input class="span2" id="appendedInput" type="text"&gt;
  &lt;span class="add-on"&gt;.00&lt;/span&gt;
&lt;/div&gt;
</pre>

          <h4>Combined</h4>
          <p>Use both classes and two instances of <code>.add-on</code> to prepend and append an input.</p>
          <form class="bs-docs-example form-inline">
            <div class="input-prepend input-append">
              <span class="add-on">$</span>
              <input class="span2" id="appendedPrependedInput" type="text">
              <span class="add-on">.00</span>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;div class="input-prepend input-append"&gt;
  &lt;span class="add-on"&gt;$&lt;/span&gt;
  &lt;input class="span2" id="appendedPrependedInput" type="text"&gt;
  &lt;span class="add-on"&gt;.00&lt;/span&gt;
&lt;/div&gt;
</pre>

          <h4>Buttons instead of text</h4>
          <p>Instead of a <code>&lt;span&gt;</code> with text, use a <code>.btn</code> to attach a button (or two) to an input.</p>
          <form class="bs-docs-example">
            <div class="input-append">
              <input class="span2" id="appendedInputButton" type="text">
              <button class="btn" type="button">Go!</button>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;div class="input-append"&gt;
  &lt;input class="span2" id="appendedInputButton" type="text"&gt;
  &lt;button class="btn" type="button"&gt;Go!&lt;/button&gt;
&lt;/div&gt;
</pre>
          <form class="bs-docs-example">
            <div class="input-append">
              <input class="span2" id="appendedInputButtons" type="text">
              <button class="btn" type="button">Search</button>
              <button class="btn" type="button">Options</button>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;div class="input-append"&gt;
  &lt;input class="span2" id="appendedInputButtons" type="text"&gt;
  &lt;button class="btn" type="button"&gt;Search&lt;/button&gt;
  &lt;button class="btn" type="button"&gt;Options&lt;/button&gt;
&lt;/div&gt;
</pre>

          <h4>Button dropdowns</h4>
          <p></p>
          <form class="bs-docs-example">
            <div class="input-append">
              <input class="span2" id="appendedDropdownButton" type="text">
              <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /input-append -->
          </form>
<pre class="prettyprint linenums">
&lt;div class="input-append"&gt;
  &lt;input class="span2" id="appendedDropdownButton" type="text"&gt;
  &lt;div class="btn-group"&gt;
    &lt;button class="btn dropdown-toggle" data-toggle="dropdown"&gt;
      Action
      &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/button&gt;
    &lt;ul class="dropdown-menu"&gt;
      ...
    &lt;/ul&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>

          <form class="bs-docs-example">
            <div class="input-prepend">
              <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <input class="span2" id="prependedDropdownButton" type="text">
            </div><!-- /input-prepend -->
          </form>
<pre class="prettyprint linenums">
&lt;div class="input-prepend"&gt;
  &lt;div class="btn-group"&gt;
    &lt;button class="btn dropdown-toggle" data-toggle="dropdown"&gt;
      Action
      &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/button&gt;
    &lt;ul class="dropdown-menu"&gt;
      ...
    &lt;/ul&gt;
  &lt;/div&gt;
  &lt;input class="span2" id="prependedDropdownButton" type="text"&gt;
&lt;/div&gt;
</pre>

          <form class="bs-docs-example">
            <div class="input-prepend input-append">
              <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
              <input class="span2" id="appendedPrependedDropdownButton" type="text">
              <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div><!-- /btn-group -->
            </div><!-- /input-prepend input-append -->
          </form>
<pre class="prettyprint linenums">
&lt;div class="input-prepend input-append"&gt;
  &lt;div class="btn-group"&gt;
    &lt;button class="btn dropdown-toggle" data-toggle="dropdown"&gt;
      Action
      &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/button&gt;
    &lt;ul class="dropdown-menu"&gt;
      ...
    &lt;/ul&gt;
  &lt;/div&gt;
  &lt;input class="span2" id="appendedPrependedDropdownButton" type="text"&gt;
  &lt;div class="btn-group"&gt;
    &lt;button class="btn dropdown-toggle" data-toggle="dropdown"&gt;
      Action
      &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/button&gt;
    &lt;ul class="dropdown-menu"&gt;
      ...
    &lt;/ul&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>

          <h4>Segmented dropdown groups</h4>
          <form class="bs-docs-example">
            <div class="input-prepend">
              <div class="btn-group">
                <button class="btn" tabindex="-1">Action</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
              <input type="text">
            </div>
            <div class="input-append">
              <input type="text">
              <div class="btn-group">
                <button class="btn" tabindex="-1">Action</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;form&gt;
  &lt;div class="input-prepend"&gt;
    &lt;div class="btn-group"&gt;...&lt;/div&gt;
    &lt;input type="text"&gt;
  &lt;/div&gt;
  &lt;div class="input-append"&gt;
    &lt;input type="text"&gt;
    &lt;div class="btn-group"&gt;...&lt;/div&gt;
  &lt;/div&gt;
&lt;/form&gt;
</pre>

          <h4>Search form</h4>
          <form class="bs-docs-example form-search">
            <div class="input-append">
              <input type="text" class="span2 search-query">
              <button type="submit" class="btn">Search</button>
            </div>
            <div class="input-prepend">
              <button type="submit" class="btn">Search</button>
              <input type="text" class="span2 search-query">
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;form class="form-search"&gt;
  &lt;div class="input-append"&gt;
    &lt;input type="text" class="span2 search-query"&gt;
    &lt;button type="submit" class="btn"&gt;Search&lt;/button&gt;
  &lt;/div&gt;
  &lt;div class="input-prepend"&gt;
    &lt;button type="submit" class="btn"&gt;Search&lt;/button&gt;
    &lt;input type="text" class="span2 search-query"&gt;
  &lt;/div&gt;
&lt;/form&gt;
</pre>

          <h3>Control sizing</h3>
          <p>Use relative sizing classes like <code>.input-large</code> or match your inputs to the grid column sizes using <code>.span*</code> classes.</p>

          <h4>Block level inputs</h4>
          <p>Make any <code>&lt;input&gt;</code> or <code>&lt;textarea&gt;</code> element behave like a block level element.</p>
          <form class="bs-docs-example" style="padding-bottom: 15px;">
            <div class="controls">
              <input class="input-block-level" type="text" placeholder=".input-block-level">
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;input class="input-block-level" type="text" placeholder=".input-block-level"&gt;
</pre>

          <h4>Relative sizing</h4>
          <form class="bs-docs-example" style="padding-bottom: 15px;">
            <div class="controls docs-input-sizes">
              <input class="input-mini" type="text" placeholder=".input-mini">
              <input class="input-small" type="text" placeholder=".input-small">
              <input class="input-medium" type="text" placeholder=".input-medium">
              <input class="input-large" type="text" placeholder=".input-large">
              <input class="input-xlarge" type="text" placeholder=".input-xlarge">
              <input class="input-xxlarge" type="text" placeholder=".input-xxlarge">
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;input class="input-mini" type="text" placeholder=".input-mini"&gt;
&lt;input class="input-small" type="text" placeholder=".input-small"&gt;
&lt;input class="input-medium" type="text" placeholder=".input-medium"&gt;
&lt;input class="input-large" type="text" placeholder=".input-large"&gt;
&lt;input class="input-xlarge" type="text" placeholder=".input-xlarge"&gt;
&lt;input class="input-xxlarge" type="text" placeholder=".input-xxlarge"&gt;
</pre>
          <p>
            <span class="label label-info">Heads up!</span> In future versions, we\'ll be altering the use of these relative input classes to match our button sizes. For example, <code>.input-large</code> will increase the padding and font-size of an input.
          </p>

          <h4>Grid sizing</h4>
          <p>Use <code>.span1</code> to <code>.span12</code> for inputs that match the same sizes of the grid columns.</p>
          <form class="bs-docs-example" style="padding-bottom: 15px;">
            <div class="controls docs-input-sizes">
              <input class="span1" type="text" placeholder=".span1">
              <input class="span2" type="text" placeholder=".span2">
              <input class="span3" type="text" placeholder=".span3">
              <select class="span1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <select class="span2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <select class="span3">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;input class="span1" type="text" placeholder=".span1"&gt;
&lt;input class="span2" type="text" placeholder=".span2"&gt;
&lt;input class="span3" type="text" placeholder=".span3"&gt;
&lt;select class="span1"&gt;
  ...
&lt;/select&gt;
&lt;select class="span2"&gt;
  ...
&lt;/select&gt;
&lt;select class="span3"&gt;
  ...
&lt;/select&gt;
</pre>

          <p>For multiple grid inputs per line, <strong>use the <code>.controls-row</code> modifier class for proper spacing</strong>. It floats the inputs to collapse white-space, sets the proper margins, and clears the float.</p>
          <form class="bs-docs-example" style="padding-bottom: 15px;">
            <div class="controls">
              <input class="span5" type="text" placeholder=".span5">
            </div>
            <div class="controls controls-row">
              <input class="span4" type="text" placeholder=".span4">
              <input class="span1" type="text" placeholder=".span1">
            </div>
            <div class="controls controls-row">
              <input class="span3" type="text" placeholder=".span3">
              <input class="span2" type="text" placeholder=".span2">
            </div>
            <div class="controls controls-row">
              <input class="span2" type="text" placeholder=".span2">
              <input class="span3" type="text" placeholder=".span3">
            </div>
            <div class="controls controls-row">
              <input class="span1" type="text" placeholder=".span1">
              <input class="span4" type="text" placeholder=".span4">
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;div class="controls"&gt;
  &lt;input class="span5" type="text" placeholder=".span5"&gt;
&lt;/div&gt;
&lt;div class="controls controls-row"&gt;
  &lt;input class="span4" type="text" placeholder=".span4"&gt;
  &lt;input class="span1" type="text" placeholder=".span1"&gt;
&lt;/div&gt;
...
</pre>

          <h3>Uneditable inputs</h3>
          <p>Present data in a form that\'s not editable without using actual form markup.</p>
          <form class="bs-docs-example">
            <span class="input-xlarge uneditable-input">Some value here</span>
          </form>
<pre class="prettyprint linenums">
&lt;span class="input-xlarge uneditable-input"&gt;Some value here&lt;/span&gt;
</pre>

          <h3>Form actions</h3>
          <p>End a form with a group of actions (buttons). When placed within a <code>.form-actions</code>, the buttons will automatically indent to line up with the form controls.</p>
          <form class="bs-docs-example">
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn">Cancel</button>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;div class="form-actions"&gt;
  &lt;button type="submit" class="btn btn-primary"&gt;Save changes&lt;/button&gt;
  &lt;button type="button" class="btn"&gt;Cancel&lt;/button&gt;
&lt;/div&gt;
</pre>

          <h3>Help text</h3>
          <p>Inline and block level support for help text that appears around form controls.</p>
          <h4>Inline help</h4>
          <form class="bs-docs-example form-inline">
            <input type="text"> <span class="help-inline">Inline help text</span>
          </form>
<pre class="prettyprint linenums">
&lt;input type="text"&gt;&lt;span class="help-inline"&gt;Inline help text&lt;/span&gt;
</pre>

          <h4>Block help</h4>
          <form class="bs-docs-example form-inline">
            <input type="text">
            <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
          </form>
<pre class="prettyprint linenums">
&lt;input type="text"&gt;&lt;span class="help-block"&gt;A longer block of help text that breaks onto a new line and may extend beyond one line.&lt;/span&gt;
</pre>


          <hr class="bs-docs-separator">


          <h2>Form control states</h2>
          <p>Provide feedback to users or visitors with basic feedback states on form controls and labels.</p>

          <h3>Input focus</h3>
          <p>We remove the default <code>outline</code> styles on some form controls and apply a <code>box-shadow</code> in its place for <code>:focus</code>.</p>
          <form class="bs-docs-example form-inline">
            <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused...">
          </form>
<pre class="prettyprint linenums">
&lt;input class="input-xlarge" id="focusedInput" type="text" value="This is focused..."&gt;
</pre>

          <h3>Invalid inputs</h3>
          <p>Style inputs via default browser functionality with <code>:invalid</code>. Specify a <code>type</code>, add the <code>required</code> attribute if the field is not optional, and (if applicable) specify a <code>pattern</code>.</p>
          <p>This is not available in versions of Internet Explorer 7-9 due to lack of support for CSS pseudo selectors.</p>
          <form class="bs-docs-example form-inline">
            <input class="span3" type="email" placeholder="test@example.com" required>
          </form>
<pre class="prettyprint linenums">
&lt;input class="span3" type="email" required&gt;
</pre>

          <h3>Disabled inputs</h3>
          <p>Add the <code>disabled</code> attribute on an input to prevent user input and trigger a slightly different look.</p>
          <form class="bs-docs-example form-inline">
            <input class="input-xlarge" id="disabledInput" type="text" placeholder="Disabled input here…" disabled>
          </form>
<pre class="prettyprint linenums">
&lt;input class="input-xlarge" id="disabledInput" type="text" placeholder="Disabled input here..." disabled&gt;
</pre>

          <h3>Validation states</h3>
          <p>Bootstrap includes validation styles for error, warning, info, and success messages. To use, add the appropriate class to the surrounding <code>.control-group</code>.</p>

          <form class="bs-docs-example form-horizontal">
            <div class="control-group warning">
              <label class="control-label" for="inputWarning">Input with warning</label>
              <div class="controls">
                <input type="text" id="inputWarning">
                <span class="help-inline">Something may have gone wrong</span>
              </div>
            </div>
            <div class="control-group error">
              <label class="control-label" for="inputError">Input with error</label>
              <div class="controls">
                <input type="text" id="inputError">
                <span class="help-inline">Please correct the error</span>
              </div>
            </div>
            <div class="control-group info">
              <label class="control-label" for="inputInfo">Input with info</label>
              <div class="controls">
                <input type="text" id="inputInfo">
                <span class="help-inline">Username is taken</span>
              </div>
            </div>
            <div class="control-group success">
              <label class="control-label" for="inputSuccess">Input with success</label>
              <div class="controls">
                <input type="text" id="inputSuccess">
                <span class="help-inline">Woohoo!</span>
              </div>
            </div>
          </form>
<pre class="prettyprint linenums">
&lt;div class="control-group warning"&gt;
  &lt;label class="control-label" for="inputWarning"&gt;Input with warning&lt;/label&gt;
  &lt;div class="controls"&gt;
    &lt;input type="text" id="inputWarning"&gt;
    &lt;span class="help-inline"&gt;Something may have gone wrong&lt;/span&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;div class="control-group error"&gt;
  &lt;label class="control-label" for="inputError"&gt;Input with error&lt;/label&gt;
  &lt;div class="controls"&gt;
    &lt;input type="text" id="inputError"&gt;
    &lt;span class="help-inline"&gt;Please correct the error&lt;/span&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;div class="control-group info"&gt;
  &lt;label class="control-label" for="inputInfo"&gt;Input with info&lt;/label&gt;
  &lt;div class="controls"&gt;
    &lt;input type="text" id="inputInfo"&gt;
    &lt;span class="help-inline"&gt;Username is already taken&lt;/span&gt;
  &lt;/div&gt;
&lt;/div&gt;

&lt;div class="control-group success"&gt;
  &lt;label class="control-label" for="inputSuccess"&gt;Input with success&lt;/label&gt;
  &lt;div class="controls"&gt;
    &lt;input type="text" id="inputSuccess"&gt;
    &lt;span class="help-inline"&gt;Woohoo!&lt;/span&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>

        </section>';

        $return .= '<!-- Buttons
        ================================================== -->
        <section id="buttons">
          <div class="page-header">
            <h1>Buttons</h1>
          </div>

          <h2>Default buttons</h2>
          <p>Button styles can be applied to anything with the <code>.btn</code> class applied. However, typically you\'ll want to apply these to only <code>&lt;a&gt;</code> and <code>&lt;button&gt;</code> elements for the best rendering.</p>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Button</th>
                <th>class=""</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><button type="button" class="btn">Default</button></td>
                <td><code>btn</code></td>
                <td>Standard gray button with gradient</td>
              </tr>
              <tr>
                <td><button type="button" class="btn btn-primary">Primary</button></td>
                <td><code>btn btn-primary</code></td>
                <td>Provides extra visual weight and identifies the primary action in a set of buttons</td>
              </tr>
              <tr>
                <td><button type="button" class="btn btn-info">Info</button></td>
                <td><code>btn btn-info</code></td>
                <td>Used as an alternative to the default styles</td>
              </tr>
              <tr>
                <td><button type="button" class="btn btn-success">Success</button></td>
                <td><code>btn btn-success</code></td>
                <td>Indicates a successful or positive action</td>
              </tr>
              <tr>
                <td><button type="button" class="btn btn-warning">Warning</button></td>
                <td><code>btn btn-warning</code></td>
                <td>Indicates caution should be taken with this action</td>
              </tr>
              <tr>
                <td><button type="button" class="btn btn-danger">Danger</button></td>
                <td><code>btn btn-danger</code></td>
                <td>Indicates a dangerous or potentially negative action</td>
              </tr>
              <tr>
                <td><button type="button" class="btn btn-inverse">Inverse</button></td>
                <td><code>btn btn-inverse</code></td>
                <td>Alternate dark gray button, not tied to a semantic action or use</td>
              </tr>
              <tr>
                <td><button type="button" class="btn btn-link">Link</button></td>
                <td><code>btn btn-link</code></td>
                <td>Deemphasize a button by making it look like a link while maintaining button behavior</td>
              </tr>
            </tbody>
          </table>

          <h4>Cross browser compatibility</h4>
          <p>IE9 doesn\'t crop background gradients on rounded corners, so we remove it. Related, IE9 jankifies disabled <code>button</code> elements, rendering text gray with a nasty text-shadow that we cannot fix.</p>


          <h2>Button sizes</h2>
          <p>Fancy larger or smaller buttons? Add <code>.btn-large</code>, <code>.btn-small</code>, or <code>.btn-mini</code> for additional sizes.</p>
          <div class="bs-docs-example">
            <p>
              <button type="button" class="btn btn-large btn-primary">Large button</button>
              <button type="button" class="btn btn-large">Large button</button>
            </p>
            <p>
              <button type="button" class="btn btn-primary">Default button</button>
              <button type="button" class="btn">Default button</button>
            </p>
            <p>
              <button type="button" class="btn btn-small btn-primary">Small button</button>
              <button type="button" class="btn btn-small">Small button</button>
            </p>
            <p>
              <button type="button" class="btn btn-mini btn-primary">Mini button</button>
              <button type="button" class="btn btn-mini">Mini button</button>
            </p>
          </div>
<pre class="prettyprint linenums">
&lt;p&gt;
  &lt;button class="btn btn-large btn-primary" type="button"&gt;Large button&lt;/button&gt;
  &lt;button class="btn btn-large" type="button"&gt;Large button&lt;/button&gt;
&lt;/p&gt;
&lt;p&gt;
  &lt;button class="btn btn-primary" type="button"&gt;Default button&lt;/button&gt;
  &lt;button class="btn" type="button"&gt;Default button&lt;/button&gt;
&lt;/p&gt;
&lt;p&gt;
  &lt;button class="btn btn-small btn-primary" type="button"&gt;Small button&lt;/button&gt;
  &lt;button class="btn btn-small" type="button"&gt;Small button&lt;/button&gt;
&lt;/p&gt;
&lt;p&gt;
  &lt;button class="btn btn-mini btn-primary" type="button"&gt;Mini button&lt;/button&gt;
  &lt;button class="btn btn-mini" type="button"&gt;Mini button&lt;/button&gt;
&lt;/p&gt;
</pre>
          <p>Create block level buttons&mdash;those that span the full width of a parent&mdash; by adding <code>.btn-block</code>.</p>
          <div class="bs-docs-example">
            <div class="well" style="max-width: 400px; margin: 0 auto 10px;">
              <button type="button" class="btn btn-large btn-block btn-primary">Block level button</button>
              <button type="button" class="btn btn-large btn-block">Block level button</button>
            </div>
          </div>
<pre class="prettyprint linenums">
&lt;button class="btn btn-large btn-block btn-primary" type="button"&gt;Block level button&lt;/button&gt;
&lt;button class="btn btn-large btn-block" type="button"&gt;Block level button&lt;/button&gt;
</pre>


          <h2>Disabled state</h2>
          <p>Make buttons look unclickable by fading them back 50%.</p>

          <h3>Anchor element</h3>
          <p>Add the <code>.disabled</code> class to <code>&lt;a&gt;</code> buttons.</p>
          <p class="bs-docs-example">
            <a href="#" class="btn btn-large btn-primary disabled">Primary link</a>
            <a href="#" class="btn btn-large disabled">Link</a>
          </p>
<pre class="prettyprint linenums">
&lt;a href="#" class="btn btn-large btn-primary disabled"&gt;Primary link&lt;/a&gt;
&lt;a href="#" class="btn btn-large disabled"&gt;Link&lt;/a&gt;
</pre>
          <p>
            <span class="label label-info">Heads up!</span>
            We use <code>.disabled</code> as a utility class here, similar to the common <code>.active</code> class, so no prefix is required. Also, this class is only for aesthetic; you must use custom JavaScript to disable links here.
          </p>

          <h3>Button element</h3>
          <p>Add the <code>disabled</code> attribute to <code>&lt;button&gt;</code> buttons.</p>
          <p class="bs-docs-example">
            <button type="button" class="btn btn-large btn-primary disabled" disabled="disabled">Primary button</button>
            <button type="button" class="btn btn-large" disabled>Button</button>
          </p>
<pre class="prettyprint linenums">
&lt;button type="button" class="btn btn-large btn-primary disabled" disabled="disabled"&gt;Primary button&lt;/button&gt;
&lt;button type="button" class="btn btn-large" disabled&gt;Button&lt;/button&gt;
</pre>


          <h2>One class, multiple tags</h2>
          <p>Use the <code>.btn</code> class on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> element.</p>
          <form class="bs-docs-example">
            <a class="btn" href="">Link</a>
            <button class="btn" type="submit">Button</button>
            <input class="btn" type="button" value="Input">
            <input class="btn" type="submit" value="Submit">
          </form>
<pre class="prettyprint linenums">
&lt;a class="btn" href=""&gt;Link&lt;/a&gt;
&lt;button class="btn" type="submit"&gt;Button&lt;/button&gt;
&lt;input class="btn" type="button" value="Input"&gt;
&lt;input class="btn" type="submit" value="Submit"&gt;
</pre>
          <p>As a best practice, try to match the element for your context to ensure matching cross-browser rendering. If you have an <code>input</code>, use an <code>&lt;input type="submit"&gt;</code> for your button.</p>

        </section>';

        $return .= '<!-- Images';
        $return .= '================================================== -->';
        $return .= '<section id="images">';
        $return .= '<div class="page-header">';
        $return .= '<h1>Images</h1>';
        $return .= '</div>';

        $return .= '<p>Add classes to an <code>&lt;img&gt;</code> element to easily style images in any project.</p>';
        $return .= '<div class="bs-docs-example bs-docs-example-images">';
        $return .= '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAFOUlEQVR4Xu3YZ0ujURCG4YkgFuyoi';
        $return .= 'GLBiiJi+f+/QLGBqNjLBwvG3sCyzIGIyeqSwTEks7dfXHGYN/PMtScnZrLZ7LvwRQJFJpABTJFJUZYSAAwQTAkAxhQXxYDBgCkBwJjiohgwGD';
        $return .= 'AlABhTXBQDBgOmBABjiotiwGDAlABgTHFRDBgMmBIAjCkuigGDAVMCgDHFRTFgMGBKADCmuCgGDAZMCQDGFBfFgMGAKQHAmOKiGDAYMCUAGFN';
        $return .= 'cFAMGA6YEAGOKi2LAYMCUAGBMcVEMGAyYEgCMKS6KAYMBUwKAMcVFMWAwYEoAMKa4KAYMBkwJAMYUF8WAwYApAcCY4qIYMBgwJQAYU1wUAwYD';
        $return .= 'pgQAY4qLYsBgwJQAYExxUQwYDJgSAIwpLooBgwFTAoAxxUUxYDBgSgAwprgoBgwGTAkAxhQXxYDBgCkBwJjiohgwGDAlABhTXBQDBgOmBABji';
        $return .= 'otiwGDAlABgTHFRDBgMmBIAjCkuigGDAVMCgDHFRTFgMGBKoOLBPD4+ytLSUhp6dnZWamtr8wLY2NiQ4+NjGR4eloGBgfS7g4MD2d3dldfXV2';
        $return .= 'lsbJSJiYn0vZivUj+vmNdUypqKBfP+/i7n5+eyubkpz8/PUl9f/xeYbDYrq6ur8vLy8gHm+vpaVlZWpLm5OQHSfyuW6elpyWQy32Zf6ueVEoH';
        $return .= 'lWRUL5vb2VhYXF0UX+fb2lk6WzyeMnh6K4fLyMtXkThg9Xba2tmRkZET6+/tlfn5enp6eZGZmJgHUk6ejoyPVLy8vp1NoampKqqqq3J/X0NBg';
        $return .= '2VVZ1FYsmLu7u7T47u5u0bed6urqPDCHh4eys7MjLS0tcnFx8QFmbW1Nzs7OZHx8XLq6uj5QTU5OplpF+PDwIE1NTQmbnkJDQ0PyG89rb28vC';
        $return .= 'wSWF1GxYHJD5k6az2By94y6urqEQOHkTphCMIU/n5ycyPr6ejpZ9ASYm5tLGH/reZZllUNtSDB64ugpom8lV1dXsr29XdQJo//j9b6zsLCQTp';
        $return .= 'S+vj4ZHR3N29NXQH/yvHJAYHkN4cDo8Lm3lcIg9JTRi+13dxg9Ufb29tI9Ru89NTU1CZ1ekL87YX76PMuyyqE2HJjCj9X7+/t5J4zeS/Qy3Nr';
        $return .= 'aKoODg+liq1D0U9L9/X36iK6oOjs75ejoSNra2vI+QX11wnxepOV5//pUVg44vnoN/x0YDUEh6L1G335yf4dRNHqfOT09TZB6e3sTppubGxkb';
        $return .= 'G5Oenp6UnxXMd88r9u8+5Qan4sGUW6DRXw9gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AO';
        $return .= 'AcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT';
        $return .= '7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/';
        $return .= 'YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1g';
        $return .= 'om/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcav';
        $return .= 'R1gom/Yeb4/HZAutcoP83oAAAAASUVORK5CYII=" class="img-rounded">';
        $return .= '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAFOUlEQVR4Xu3YZ0ujURCG4YkgFuyoi';
        $return .= 'GLBiiJi+f+/QLGBqNjLBwvG3sCyzIGIyeqSwTEks7dfXHGYN/PMtScnZrLZ7LvwRQJFJpABTJFJUZYSAAwQTAkAxhQXxYDBgCkBwJjiohgwGD';
        $return .= 'AlABhTXBQDBgOmBABjiotiwGDAlABgTHFRDBgMmBIAjCkuigGDAVMCgDHFRTFgMGBKADCmuCgGDAZMCQDGFBfFgMGAKQHAmOKiGDAYMCUAGFN';
        $return .= 'cFAMGA6YEAGOKi2LAYMCUAGBMcVEMGAyYEgCMKS6KAYMBUwKAMcVFMWAwYEoAMKa4KAYMBkwJAMYUF8WAwYApAcCY4qIYMBgwJQAYU1wUAwYD';
        $return .= 'pgQAY4qLYsBgwJQAYExxUQwYDJgSAIwpLooBgwFTAoAxxUUxYDBgSgAwprgoBgwGTAkAxhQXxYDBgCkBwJjiohgwGDAlABhTXBQDBgOmBABji';
        $return .= 'otiwGDAlABgTHFRDBgMmBIAjCkuigGDAVMCgDHFRTFgMGBKoOLBPD4+ytLSUhp6dnZWamtr8wLY2NiQ4+NjGR4eloGBgfS7g4MD2d3dldfXV2';
        $return .= 'lsbJSJiYn0vZivUj+vmNdUypqKBfP+/i7n5+eyubkpz8/PUl9f/xeYbDYrq6ur8vLy8gHm+vpaVlZWpLm5OQHSfyuW6elpyWQy32Zf6ueVEoH';
        $return .= 'lWRUL5vb2VhYXF0UX+fb2lk6WzyeMnh6K4fLyMtXkThg9Xba2tmRkZET6+/tlfn5enp6eZGZmJgHUk6ejoyPVLy8vp1NoampKqqqq3J/X0NBg';
        $return .= '2VVZ1FYsmLu7u7T47u5u0bed6urqPDCHh4eys7MjLS0tcnFx8QFmbW1Nzs7OZHx8XLq6uj5QTU5OplpF+PDwIE1NTQmbnkJDQ0PyG89rb28vC';
        $return .= 'wSWF1GxYHJD5k6az2By94y6urqEQOHkTphCMIU/n5ycyPr6ejpZ9ASYm5tLGH/reZZllUNtSDB64ugpom8lV1dXsr29XdQJo//j9b6zsLCQTp';
        $return .= 'S+vj4ZHR3N29NXQH/yvHJAYHkN4cDo8Lm3lcIg9JTRi+13dxg9Ufb29tI9Ru89NTU1CZ1ekL87YX76PMuyyqE2HJjCj9X7+/t5J4zeS/Qy3Nr';
        $return .= 'aKoODg+liq1D0U9L9/X36iK6oOjs75ejoSNra2vI+QX11wnxepOV5//pUVg44vnoN/x0YDUEh6L1G335yf4dRNHqfOT09TZB6e3sTppubGxkb';
        $return .= 'G5Oenp6UnxXMd88r9u8+5Qan4sGUW6DRXw9gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AO';
        $return .= 'AcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT';
        $return .= '7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/';
        $return .= 'YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1g';
        $return .= 'om/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcav';
        $return .= 'R1gom/Yeb4/HZAutcoP83oAAAAASUVORK5CYII=" class="img-circle">';
        $return .= '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAFOUlEQVR4Xu3YZ0ujURCG4YkgFuyoi';
        $return .= 'GLBiiJi+f+/QLGBqNjLBwvG3sCyzIGIyeqSwTEks7dfXHGYN/PMtScnZrLZ7LvwRQJFJpABTJFJUZYSAAwQTAkAxhQXxYDBgCkBwJjiohgwGD';
        $return .= 'AlABhTXBQDBgOmBABjiotiwGDAlABgTHFRDBgMmBIAjCkuigGDAVMCgDHFRTFgMGBKADCmuCgGDAZMCQDGFBfFgMGAKQHAmOKiGDAYMCUAGFN';
        $return .= 'cFAMGA6YEAGOKi2LAYMCUAGBMcVEMGAyYEgCMKS6KAYMBUwKAMcVFMWAwYEoAMKa4KAYMBkwJAMYUF8WAwYApAcCY4qIYMBgwJQAYU1wUAwYD';
        $return .= 'pgQAY4qLYsBgwJQAYExxUQwYDJgSAIwpLooBgwFTAoAxxUUxYDBgSgAwprgoBgwGTAkAxhQXxYDBgCkBwJjiohgwGDAlABhTXBQDBgOmBABji';
        $return .= 'otiwGDAlABgTHFRDBgMmBIAjCkuigGDAVMCgDHFRTFgMGBKoOLBPD4+ytLSUhp6dnZWamtr8wLY2NiQ4+NjGR4eloGBgfS7g4MD2d3dldfXV2';
        $return .= 'lsbJSJiYn0vZivUj+vmNdUypqKBfP+/i7n5+eyubkpz8/PUl9f/xeYbDYrq6ur8vLy8gHm+vpaVlZWpLm5OQHSfyuW6elpyWQy32Zf6ueVEoH';
        $return .= 'lWRUL5vb2VhYXF0UX+fb2lk6WzyeMnh6K4fLyMtXkThg9Xba2tmRkZET6+/tlfn5enp6eZGZmJgHUk6ejoyPVLy8vp1NoampKqqqq3J/X0NBg';
        $return .= '2VVZ1FYsmLu7u7T47u5u0bed6urqPDCHh4eys7MjLS0tcnFx8QFmbW1Nzs7OZHx8XLq6uj5QTU5OplpF+PDwIE1NTQmbnkJDQ0PyG89rb28vC';
        $return .= 'wSWF1GxYHJD5k6az2By94y6urqEQOHkTphCMIU/n5ycyPr6ejpZ9ASYm5tLGH/reZZllUNtSDB64ugpom8lV1dXsr29XdQJo//j9b6zsLCQTp';
        $return .= 'S+vj4ZHR3N29NXQH/yvHJAYHkN4cDo8Lm3lcIg9JTRi+13dxg9Ufb29tI9Ru89NTU1CZ1ekL87YX76PMuyyqE2HJjCj9X7+/t5J4zeS/Qy3Nr';
        $return .= 'aKoODg+liq1D0U9L9/X36iK6oOjs75ejoSNra2vI+QX11wnxepOV5//pUVg44vnoN/x0YDUEh6L1G335yf4dRNHqfOT09TZB6e3sTppubGxkb';
        $return .= 'G5Oenp6UnxXMd88r9u8+5Qan4sGUW6DRXw9gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AO';
        $return .= 'AcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT';
        $return .= '7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/';
        $return .= 'YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1g';
        $return .= 'om/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcavR1gom/YeT7AOAcav';
        $return .= 'R1gom/Yeb4/HZAutcoP83oAAAAASUVORK5CYII=" class="img-polaroid">';
        $return .= '</div>';
        $return .= '<pre class="prettyprint linenums">';
        $return .= '&lt;img src="..." class="img-rounded"&gt;';
        $return .= '&lt;img src="..." class="img-circle"&gt;';
        $return .= '&lt;img src="..." class="img-polaroid"&gt;';
        $return .= '</pre>';
        $return .= '<p><span class="label label-info">Heads up!</span> <code>.img-rounded</code> and <code>.img-circle</code> do';
        $return .= 'not work in IE7-8 due to lack of <code>border-radius</code> support.</p>';
        $return .= '</section>';

        return $return;
    }

}
