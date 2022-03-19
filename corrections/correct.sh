#!/bin/bash

echo "Starting correction..."

base_path=$(pwd)

# TODO: Check if package jq, pylint and standard are installed

# for each directory in the base path
for dir in */; do
    # move to the directory
    cd $base_path/$dir

    # for each file in the directory
    for file in *; do
        # check if the file is not equal to data.json
        if [ $file != "data.json" ]; then
            extension="${file##*.}"
            if [ $extension = "py" ]; then
                # find the rating of the file from pylint command
                rating=$(pylint $file | grep "Your code has been rated at" | cut -d " " -f 7)

            elif [ $extension = "js" ]; then
                # find the rating of the file from standard command
                # execute standard command and store the output in a file
                standard_output=$(standard $file > standard_output.txt)
                lines=$(wc -l standard_output.txt | cut -d " " -f 1)

                # calculate the rating
                base=10
                rating=$(( base - lines ))
                rating=$rating.00/10
            fi

            # from data.json get the id
            id=$(cat data.json | jq -r '.id')

            # send to api the rating for this file
            curl -X POST -H "Content-Type: application/json" -d \
                '{"rating":"'$rating'"}' "http://127.0.0.1:8000/api/exercise-files/$id/set-rating"; \
        fi
    done

    # remove the directory
    cd $base_path
    rm -rf $dir
done
