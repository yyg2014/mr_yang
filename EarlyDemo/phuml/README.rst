
**尊重原创　转自http://www.arkulo.com/2015/04/08/phuml**
很多朋友学习一些开源代码的时候，总是有一种摸不着边的感觉，看源代码，不管从什么地方开始看，都感觉是瞎子摸象，毫无头绪。

如果我们能够看到项目的整体结构，然后再各个击破，那是不是会容易很多？！

整体结构其实就是软件的静态结构－－类图

我们的目标就是从已有代码中，通过工具分析并直接生成类图～～

phUml
个人推荐这个，我本人就是使用这个做逆向 它本身也是使用php编写的

源代码下载
在很多网上的文章中，phuml的源代码都是用svn安装，可是现在那个地址貌似已经用不了了

现在可以用

git clone https://github.com/jakobwesthoff/phuml
进行安装，同时，还需要安装一个小东西graphviz:

sudo apt-get install graphviz
使用
php phuml -r 要解析的目录地址 -graphviz -createAssoclations false -neato out.png
这里的out.png就是它生成的类图图片

.. note:: **WARNING**: This project isn't actively maintained anymore, mainly due to
    the lack of time. I migrated it to github by request. Hopefully somebody
    might find this useful as a base to work on again. Eventhough it should
    still be compatible with current PHP versions. It does not support *newer*
    features like namespace and such. Of course Pull-Requests are always
    welcome. If somebody wants to take over maintership completely I would be
    happy to discuss that.

=====
phUML
=====

What is this all about?
=======================

phUML is fully automatic UML_ class diagramm generator written PHP_. It is
capable of parsing any PHP5_ object oriented source code and create an
appropriate image representation of the oo structure based on the UML_
specification.

.. _UML: http://en.wikipedia.org/wiki/Unified_Modeling_Language
.. _PHP: http://php.net
.. _PHP5: http://www.php.net/downloads.php#v5


What does it look like?
=======================

.. image:: https://raw.githubusercontent.com/jakobwesthoff/phuml/master/images/phuml_example_thumbnail.jpg
   :alt: Class diagram of the phUML generator
   :align: center
   :target: https://raw.githubusercontent.com/jakobwesthoff/phuml/master/images/phuml_example.png

The image shown here is the class diagramm which phUML created when run on
its own codebase. This image is hardly readable, because it has been resized
to fit in the layout of this page. You can take a look at the complete image
by clicking here_

.. _here: https://raw.githubusercontent.com/jakobwesthoff/phuml/master/images/phuml_example.png


Can I use this for my own projects?
===================================

phUML should be compatible with any object oriented code written in PHP5_. At
the moment it unfortunatly does not support any PHP4_ code. 

.. _PHP4:  http://php.net

phUML has quite a informative help interface, which can be accessed by calling
it with the -h option. ::
	
	$ phuml -h

The phUML generator works with so called processors, which may be used in a
chain to create a lot of different output formats. Every available processor
can be listed by calling phUML with the -l option. ::

	$ phuml -l

The most important processor used to create images of any kind is the
graphviz processor. As its name indicates it outputs information in the so
called dot language used by graphviz_. To sucessfully handle this output
format and create the desired images you will need the graphviz_ toolkit
installed on your system. You may then call the neato or dot
executables, which are part of graphviz_, to process the created file
manually or you may phUML do this for you by using the dot or neato
processor.

.. _graphviz: http://www.graphviz.org

You should just play around with the phUML commandline tool to get a better
understanding of what the processors do and how they work. To give you a short
example of how a complete phUML call could look like, this is the one used
generate the example you can see above. ::

	$ phuml -r ./ -dot -createAssociations false -neato example.png


  [1]: http://www.arkulo.com/2015/04/08/phuml/
