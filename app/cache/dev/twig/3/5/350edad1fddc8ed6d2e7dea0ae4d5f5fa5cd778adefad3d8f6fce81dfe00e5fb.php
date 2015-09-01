<?php

/* JYGRevestimientosBundle:Page:vision.html.twig */
class __TwigTemplate_350edad1fddc8ed6d2e7dea0ae4d5f5fa5cd778adefad3d8f6fce81dfe00e5fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:vision.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "JYGRevestimientosBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3fd042deabe3bdb22aae7857bd79ec049b06a9dc321d8395c9b9f5b983033eb8 = $this->env->getExtension("native_profiler");
        $__internal_3fd042deabe3bdb22aae7857bd79ec049b06a9dc321d8395c9b9f5b983033eb8->enter($__internal_3fd042deabe3bdb22aae7857bd79ec049b06a9dc321d8395c9b9f5b983033eb8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:vision.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3fd042deabe3bdb22aae7857bd79ec049b06a9dc321d8395c9b9f5b983033eb8->leave($__internal_3fd042deabe3bdb22aae7857bd79ec049b06a9dc321d8395c9b9f5b983033eb8_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_6b3ebff5ac14df89c538ab153395421788e5e66cd77da30d9552784ad68d59c4 = $this->env->getExtension("native_profiler");
        $__internal_6b3ebff5ac14df89c538ab153395421788e5e66cd77da30d9552784ad68d59c4->enter($__internal_6b3ebff5ac14df89c538ab153395421788e5e66cd77da30d9552784ad68d59c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Visión";
        
        $__internal_6b3ebff5ac14df89c538ab153395421788e5e66cd77da30d9552784ad68d59c4->leave($__internal_6b3ebff5ac14df89c538ab153395421788e5e66cd77da30d9552784ad68d59c4_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_7810c9076196dcab548d790e1820bc9ba2469097923fd72710bedde16f8ce1c5 = $this->env->getExtension("native_profiler");
        $__internal_7810c9076196dcab548d790e1820bc9ba2469097923fd72710bedde16f8ce1c5->enter($__internal_7810c9076196dcab548d790e1820bc9ba2469097923fd72710bedde16f8ce1c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_7810c9076196dcab548d790e1820bc9ba2469097923fd72710bedde16f8ce1c5->leave($__internal_7810c9076196dcab548d790e1820bc9ba2469097923fd72710bedde16f8ce1c5_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:vision.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
