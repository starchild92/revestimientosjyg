<?php

/* base.html.twig */
class __TwigTemplate_50da80b2f8bec2aa9c131dfc8f505b344876a18dc47f0be757a6b07ec22b7ba8 extends Twig_Template
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
        $__internal_bdbd1c7c895718bed96bd1db760a218fe2f0e2b7d6dce332d04165da30d9eb82 = $this->env->getExtension("native_profiler");
        $__internal_bdbd1c7c895718bed96bd1db760a218fe2f0e2b7d6dce332d04165da30d9eb82->enter($__internal_bdbd1c7c895718bed96bd1db760a218fe2f0e2b7d6dce332d04165da30d9eb82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_bdbd1c7c895718bed96bd1db760a218fe2f0e2b7d6dce332d04165da30d9eb82->leave($__internal_bdbd1c7c895718bed96bd1db760a218fe2f0e2b7d6dce332d04165da30d9eb82_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_973d17b4d143c405f741b2d04d9338d5753fdfcabb1420f77af2d81818bf388e = $this->env->getExtension("native_profiler");
        $__internal_973d17b4d143c405f741b2d04d9338d5753fdfcabb1420f77af2d81818bf388e->enter($__internal_973d17b4d143c405f741b2d04d9338d5753fdfcabb1420f77af2d81818bf388e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_973d17b4d143c405f741b2d04d9338d5753fdfcabb1420f77af2d81818bf388e->leave($__internal_973d17b4d143c405f741b2d04d9338d5753fdfcabb1420f77af2d81818bf388e_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_2790ce619e76e215505119aecdbe3dd5df9913f9acc1b8e1e4386d2d4a78d8a6 = $this->env->getExtension("native_profiler");
        $__internal_2790ce619e76e215505119aecdbe3dd5df9913f9acc1b8e1e4386d2d4a78d8a6->enter($__internal_2790ce619e76e215505119aecdbe3dd5df9913f9acc1b8e1e4386d2d4a78d8a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_2790ce619e76e215505119aecdbe3dd5df9913f9acc1b8e1e4386d2d4a78d8a6->leave($__internal_2790ce619e76e215505119aecdbe3dd5df9913f9acc1b8e1e4386d2d4a78d8a6_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_c88ad053917ae00c19ea9fc88983a11dafacb1b96e346149f8b41ea7bb4429f4 = $this->env->getExtension("native_profiler");
        $__internal_c88ad053917ae00c19ea9fc88983a11dafacb1b96e346149f8b41ea7bb4429f4->enter($__internal_c88ad053917ae00c19ea9fc88983a11dafacb1b96e346149f8b41ea7bb4429f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_c88ad053917ae00c19ea9fc88983a11dafacb1b96e346149f8b41ea7bb4429f4->leave($__internal_c88ad053917ae00c19ea9fc88983a11dafacb1b96e346149f8b41ea7bb4429f4_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_ad0ded11811a043cc3eb979f05d3a395c89f0d7ee3db5cd35d5665298cb70f06 = $this->env->getExtension("native_profiler");
        $__internal_ad0ded11811a043cc3eb979f05d3a395c89f0d7ee3db5cd35d5665298cb70f06->enter($__internal_ad0ded11811a043cc3eb979f05d3a395c89f0d7ee3db5cd35d5665298cb70f06_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_ad0ded11811a043cc3eb979f05d3a395c89f0d7ee3db5cd35d5665298cb70f06->leave($__internal_ad0ded11811a043cc3eb979f05d3a395c89f0d7ee3db5cd35d5665298cb70f06_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
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
