#!/bin/bash

GITHUB_API_URL="https://api.github.com/repos/khaledsalahat/linux/statuses/${GIT_COMMIT}"

GITHUB_TOKEN="secret"

if [ "$BUILD_RESULT" = "SUCCESS" ]; then
    STATUS="success"
    DESCRIPTION="Build successful!"
else
    STATUS="failure"
    DESCRIPTION="Build failed!"
fi

curl -X POST \
     -H "Authorization: token ${GITHUB_TOKEN}" \
     -H "Accept: application/vnd.github.v3+json" \
     -d "{\"state\": \"${STATUS}\", \"description\": \"${DESCRIPTION}\", \"context\": \"jenkins/build\"}" \
     "${GITHUB_API_URL}"
