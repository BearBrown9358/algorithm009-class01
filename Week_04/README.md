## DFS && BFS 

### 代码模版
+ DFS
 ```python
 #python
 
 visited = set() 
 
 def dfs(node, visited):
     if node in visited: # terminator
     	# already visited 
     	return 
 
 	visited.add(node) 
 
 	# process current node here. 
 	...
 	for next_node in node.children(): 
 		if next_node not in visited: 
 			dfs(next_node, visited)
```

```php
    #php

    function dfs($node, $visited){
        # terminator
        if(in_array($node , $visited)) return ; # already visited

        # process current node here.
        ...

        $visited[] = $node;

        foreach ($this->getChildren() as $child){
            if (in_array($child , $visited)) continue;

            $this->dfs($child , $visited);
        }
    }
```

+ BFS 广度优先算法

```php
    #php
    /**
     * bfs constructor.
     * 广度优先遍历
     * @param $root tree
     */
    public function bfs($root)
    {
        $result      = [];
        $this->queue = [$root];

        while (count($root) > 0) {
            $level  = [];
            $length = count($root);

            for ($i = 0; $i < $length; $i++) {
                $node    = array_pop($this->queue);
                $level[] = $node->val;
                if ($node->left) array_unshift($this->queue, $node->left);
                if ($node->right) array_unshift($this->queue, $node->right);
            }

            $result[] = $level;
        }

        return $result;
    }
```

```javascript
//JavaScript
const bfs = (root) => {
  let result = [], queue = [root]
  while (queue.length > 0) {
    let level = [], n = queue.length
    for (let i = 0; i < n; i++) {
      let node = queue.pop()
      level.push(node.val) 
      if (node.left) queue.unshift(node.left)
      if (node.right) queue.unshift(node.right)
    }
    result.push(level)
  }
  return result
};

```

```python
# Python
def BFS(graph, start, end):
    visited = set()
    queue = []
    queue.append([start])
    while queue:
        node = queue.pop()
        visited.add(node)
        process(node)
        nodes = generate_related_nodes(node)
        queue.push(nodes)
    # other processing work
    ...
```