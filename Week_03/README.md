## 递归
### 泛型递归 recursion
+ 代码示例
     ```python
        # Python
        def recursion(level, param1, param2, ...): 
            # recursion terminator 
            if level > MAX_LEVEL: 
               process_result 
               return 
            # process logic in current level 
            process(level, data...) 
            # drill down 
            self.recursion(level + 1, p1, ...) 
            # reverse the current level status if needed
     ```
     ```javascript
        // JavaScript
        const recursion = (level, params) =>{
           // recursion terminator
           if(level > MAX_LEVEL){
             process_result
             return 
           }
           // process current level
           process(level, params)
           //drill down
           recursion(level+1, params)
           //clean current level status if needed
           
        }
    ```
    
    ```php
    /**
     * 递归泛型模版
     * @param $level
     * @param $params
     */
    function recursion($level , $params)
    {
        # recursion terminator
        if(level > MAX_LEVEL){
            # process_result
             return ;
           }
         
        # process current level
        process(level, params);
      
        # drill down
        $this->recursion(level+1, $params);
      
        # clean current level status if needed
    }
    ```
    
### 分治 divide_conquer
+ 分治代码模版
    ```Python
    # Python
    def divide_conquer(problem, param1, param2, ...): 
      # recursion terminator 
      if problem is None: 
    	print_result 
    	return 
    
      # prepare data 
      data = prepare_data(problem) 
      subproblems = split_problem(problem, data) 
    
      # conquer subproblems 
      subresult1 = self.divide_conquer(subproblems[0], p1, ...) 
      subresult2 = self.divide_conquer(subproblems[1], p1, ...) 
      subresult3 = self.divide_conquer(subproblems[2], p1, ...) 
      …
    
      # process and generate the final result 
      result = process_result(subresult1, subresult2, subresult3, …)
    	
      # revert the current level states
    ```

### 回溯 backtrack
