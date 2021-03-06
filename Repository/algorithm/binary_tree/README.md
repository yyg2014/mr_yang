 ## 二叉树(Binary Tree)

 ## 哈夫曼树(Huffman Tree)：
 给定n个权值作为n个叶子结点，构造一棵二叉树，若带权路径长度达到最小，称这样的二叉树为最优二叉树，也称为哈夫曼树(Huffman Tree)。哈夫曼树是带权路径长度最短的树，权值较大的结点离根较近。

    1、路径和路径长度
      在一棵树中，从一个结点往下可以达到的孩子或孙子结点之间的通路，称为路径。通路中分支的数目称为路径长度。若规定根结点的层数为1，则从根结点到第L层结点的路径长度为L-1。、

    2、结点的权及带权路径长度
      若将树中结点赋给一个有着某种含义的数值，则这个数值称为该结点的权。结点的带权路径长度为：从根结点到该结点之间的路径长度与该结点的权的乘积。

    3、树的带权路径长度
      树的带权路径长度规定为所有叶子结点的带权路径长度之和，记为WPL。

 ## 满二叉树(Full Binary Tree):

    国际标准：满二叉树的任意节点，要么度为0，要么度为2.换个说法即要么为叶子结点，要么同时具有左右孩子。霍夫曼树是符合这种定义的，满足国际上定义的满二叉树，但是不满足国内的定义.
    国内标准：除叶子节点外，每一层上的所有节点都有两个子节点（最后一层上的无子结点的结点为叶子结点）。也可以这样理解，除叶子结点外的所有节点均有两个子节点。节点数达到最大值。所有叶子结点必须在同一层上.
    如果一颗树深度为d，最大层数为k
    它的叶子数是： 2^d
    第k层的节点数是： 2^(k-1)
    总节点数是： 2^k-1 (2的k次方减一)
    总节点数一定是奇数。

 ## 完全二叉树(Complete Binary Tree)：

    若设二叉树的深度为h，除第 h 层外，其它各层 (1～h-1) 的结点数都达到最大个数，第 h 层所有的结点都连续集中在最左边，这就是完全二叉树。
    完全二叉树是由满二叉树而引出来的。对于深度为K的，有n个结点的二叉树，当且仅当其每一个结点都与深度为K的满二叉树中编号从1至n的结点一一对应时称之为完全二叉树。
    一棵二叉树至多只有最下面的一层上的结点的度数可以小于2，并且最下层上的结点都集中在该层最左边的若干位置上，则此二叉树成为完全二叉树。


 ### [术语]
 #### 1.根二叉树(Rooted Binary Tree)：
    有一个根结点，每个结点至多有两个孩子。

 #### 2.满二叉树(Full Binary Tree)：
    要么是叶子结点(结点的度为0)，要么结点同时具有左右子树(结点的度为2)。

 #### 3.完全二叉树(Complete Binary Tree)：
    每层结点都完全填满，在最后一层上如果不是满的，则只缺少右边的若干结点。

 #### 4.完美二叉树(Perfect Binary Tree)
    所有的非叶子结点都有两个孩子，所有的叶子结点都在同一层。即每层结点都完全填满。

 #### 5.无限完全二叉树(Infinite Complete Binary Tree)：
    每个结点都有两个孩子，结点的层数是无限的。

 #### 6.平衡二叉树(Balanced Binary Tree)：
    也称为AVL树，它是一棵空树或它的左右两个子树的高度差的绝对值不超过1，并且左右两个子树都是一棵平衡二叉树。
