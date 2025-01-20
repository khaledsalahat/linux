#!/bin/bash

JENKINS_USER="waseem"
JENKINS_PASSWORD="123456789" 
JENKINS_URL="http://localhost:8080"
JOB_NAME="dictionary-app-deploy"

GIT_REPO_URL="https://github.com/khaledsalahat/linux.git" 
GIT_BRANCH="main"

cd /home/waseem-jadaa/Desktop/lamp

echo "Pushing code changes to Git"
git add .
git commit -m "Updated application code"
git push origin "$GIT_BRANCH"

if [ $? -eq 0 ]; then
    echo "Code pushed to Github successfully"
else
    echo "Failed to push code to Github"
    exit 1
fi

echo "starting Jenkins job: $JOB_NAME..."
curl -X POST "$JENKINS_URL/job/$JOB_NAME/build" --user "$JENKINS_USER:$JENKINS_PASSWORD"

if [ $? -eq 0 ]; then
    echo "Jenkins job started successfully"
else
    echo "Failed to start Jenkins job"
    exit 1
fi

echo "Automation script completed"

cd
