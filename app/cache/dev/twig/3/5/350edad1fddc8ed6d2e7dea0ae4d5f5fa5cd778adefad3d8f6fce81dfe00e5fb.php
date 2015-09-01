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
        $__internal_3c3097b9b5394fee366c8612352d38a598e9b02ea2026a0208812db3d7ad4858 = $this->env->getExtension("native_profiler");
        $__internal_3c3097b9b5394fee366c8612352d38a598e9b02ea2026a0208812db3d7ad4858->enter($__internal_3c3097b9b5394fee366c8612352d38a598e9b02ea2026a0208812db3d7ad4858_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:vision.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3c3097b9b5394fee366c8612352d38a598e9b02ea2026a0208812db3d7ad4858->leave($__internal_3c3097b9b5394fee366c8612352d38a598e9b02ea2026a0208812db3d7ad4858_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_ffdd5c0fe68c9dff4bdf0ddc3b4daaaeeaab7f36e3f3b10f89776661167fad7c = $this->env->getExtension("native_profiler");
        $__internal_ffdd5c0fe68c9dff4bdf0ddc3b4daaaeeaab7f36e3f3b10f89776661167fad7c->enter($__internal_ffdd5c0fe68c9dff4bdf0ddc3b4daaaeeaab7f36e3f3b10f89776661167fad7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Visión";
        
        $__internal_ffdd5c0fe68c9dff4bdf0ddc3b4daaaeeaab7f36e3f3b10f89776661167fad7c->leave($__internal_ffdd5c0fe68c9dff4bdf0ddc3b4daaaeeaab7f36e3f3b10f89776661167fad7c_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_222d43974ce4a168ae082fd17493aabf88d2bd005c165118b33fa22b635ceb92 = $this->env->getExtension("native_profiler");
        $__internal_222d43974ce4a168ae082fd17493aabf88d2bd005c165118b33fa22b635ceb92->enter($__internal_222d43974ce4a168ae082fd17493aabf88d2bd005c165118b33fa22b635ceb92_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_222d43974ce4a168ae082fd17493aabf88d2bd005c165118b33fa22b635ceb92->leave($__internal_222d43974ce4a168ae082fd17493aabf88d2bd005c165118b33fa22b635ceb92_prof);

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
