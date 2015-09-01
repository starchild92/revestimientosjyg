<?php

/* ::base.html.twig */
class __TwigTemplate_49815f5902bd099a70a7e8080b30ed6c3618b412a48960361c31a07c22fe128f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f319fd9fb752024baca9b60f3082de47502ae60a2c3a75230cea21bfb2170a27 = $this->env->getExtension("native_profiler");
        $__internal_f319fd9fb752024baca9b60f3082de47502ae60a2c3a75230cea21bfb2170a27->enter($__internal_f319fd9fb752024baca9b60f3082de47502ae60a2c3a75230cea21bfb2170a27_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_f319fd9fb752024baca9b60f3082de47502ae60a2c3a75230cea21bfb2170a27->leave($__internal_f319fd9fb752024baca9b60f3082de47502ae60a2c3a75230cea21bfb2170a27_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_5085be8b48a8a20ce10fabc9eb02c96da4bab75dccaea6da6db67ff63bf4f41a = $this->env->getExtension("native_profiler");
        $__internal_5085be8b48a8a20ce10fabc9eb02c96da4bab75dccaea6da6db67ff63bf4f41a->enter($__internal_5085be8b48a8a20ce10fabc9eb02c96da4bab75dccaea6da6db67ff63bf4f41a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_5085be8b48a8a20ce10fabc9eb02c96da4bab75dccaea6da6db67ff63bf4f41a->leave($__internal_5085be8b48a8a20ce10fabc9eb02c96da4bab75dccaea6da6db67ff63bf4f41a_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_a97545902bfc512587e8b7c8d8990048c442415837ab269fdfe1020e3b2bcbdd = $this->env->getExtension("native_profiler");
        $__internal_a97545902bfc512587e8b7c8d8990048c442415837ab269fdfe1020e3b2bcbdd->enter($__internal_a97545902bfc512587e8b7c8d8990048c442415837ab269fdfe1020e3b2bcbdd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_a97545902bfc512587e8b7c8d8990048c442415837ab269fdfe1020e3b2bcbdd->leave($__internal_a97545902bfc512587e8b7c8d8990048c442415837ab269fdfe1020e3b2bcbdd_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_bd96ae3f2bb74c5a7b571d7bc35caf57df6d628ce3e326da967e8b60064b2eec = $this->env->getExtension("native_profiler");
        $__internal_bd96ae3f2bb74c5a7b571d7bc35caf57df6d628ce3e326da967e8b60064b2eec->enter($__internal_bd96ae3f2bb74c5a7b571d7bc35caf57df6d628ce3e326da967e8b60064b2eec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_bd96ae3f2bb74c5a7b571d7bc35caf57df6d628ce3e326da967e8b60064b2eec->leave($__internal_bd96ae3f2bb74c5a7b571d7bc35caf57df6d628ce3e326da967e8b60064b2eec_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4c69c457540267e552f3187f7612425361cad418522af539c5097851ab5f221b = $this->env->getExtension("native_profiler");
        $__internal_4c69c457540267e552f3187f7612425361cad418522af539c5097851ab5f221b->enter($__internal_4c69c457540267e552f3187f7612425361cad418522af539c5097851ab5f221b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_4c69c457540267e552f3187f7612425361cad418522af539c5097851ab5f221b->leave($__internal_4c69c457540267e552f3187f7612425361cad418522af539c5097851ab5f221b_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
