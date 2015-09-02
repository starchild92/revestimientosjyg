<?php

/* JYGRevestimientosBundle:Page:productos.html.twig */
class __TwigTemplate_1d7cd32538200e56e1abf71ebc452159ad4ac27a180ad48f13e6077a030311f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("JYGRevestimientosBundle::base.html.twig", "JYGRevestimientosBundle:Page:productos.html.twig", 1);
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
        $__internal_80057d7eecda8bd33f4f85d3100605b3efb1cf19fb4cbe5d2a6e279981179051 = $this->env->getExtension("native_profiler");
        $__internal_80057d7eecda8bd33f4f85d3100605b3efb1cf19fb4cbe5d2a6e279981179051->enter($__internal_80057d7eecda8bd33f4f85d3100605b3efb1cf19fb4cbe5d2a6e279981179051_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "JYGRevestimientosBundle:Page:productos.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_80057d7eecda8bd33f4f85d3100605b3efb1cf19fb4cbe5d2a6e279981179051->leave($__internal_80057d7eecda8bd33f4f85d3100605b3efb1cf19fb4cbe5d2a6e279981179051_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_758e163824b209cc97718f2d2a9ccb8a910157c52a1709c996829e189d7113be = $this->env->getExtension("native_profiler");
        $__internal_758e163824b209cc97718f2d2a9ccb8a910157c52a1709c996829e189d7113be->enter($__internal_758e163824b209cc97718f2d2a9ccb8a910157c52a1709c996829e189d7113be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Revestimientos J&G - Productos";
        
        $__internal_758e163824b209cc97718f2d2a9ccb8a910157c52a1709c996829e189d7113be->leave($__internal_758e163824b209cc97718f2d2a9ccb8a910157c52a1709c996829e189d7113be_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_9309bfe76caf46ccb2defb6b8c6e2e8c29ab08943520adf75d8cdd8169db3ebd = $this->env->getExtension("native_profiler");
        $__internal_9309bfe76caf46ccb2defb6b8c6e2e8c29ab08943520adf75d8cdd8169db3ebd->enter($__internal_9309bfe76caf46ccb2defb6b8c6e2e8c29ab08943520adf75d8cdd8169db3ebd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        echo "\t
\t<div class=\"container\">
\t\t<h1>Welcome to the Page:vision page</h1>
\t</div>
";
        
        $__internal_9309bfe76caf46ccb2defb6b8c6e2e8c29ab08943520adf75d8cdd8169db3ebd->leave($__internal_9309bfe76caf46ccb2defb6b8c6e2e8c29ab08943520adf75d8cdd8169db3ebd_prof);

    }

    public function getTemplateName()
    {
        return "JYGRevestimientosBundle:Page:productos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 5,  35 => 3,  11 => 1,);
    }
}
