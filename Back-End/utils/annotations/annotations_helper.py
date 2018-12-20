# Copyright (c) Microsoft. All rights reserved.

# Licensed under the MIT license. See LICENSE.md file in the project root
# for full license information.
# ==============================================================================

import numpy as np
import os

def parse_class_map_file(class_map_file):

        with open(class_map_file.replace("\\","/"), "r") as f:
            lines = f.readlines()
        class_list = [None]*len(lines)
        for line in lines:
            if line != '':
                try:
                    tab_pos = line.find('\t')
                    class_name = line[:tab_pos]
                    class_id = int(line[tab_pos+1:-1])
                    class_list[class_id] = class_name
                except ValueError:
                    print (tab_pos)
        return class_list
    
#"D:\\home\\site\\wwwroot\\CNTKModels\\HotailorPOC2_class_map.txt"