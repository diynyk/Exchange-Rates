#!/usr/bin/env bash
PHP_VER=$1
IMAGE_TAG="${DOCKER_USERNAME}/php-cli:${PHP_VER}"
echo "${DOCKER_PASSWORD}" | docker login --username ${DOCKER_USERNAME} --password-stdin
docker build --build-arg PHP_VER=${PHP_VER} -t ${IMAGE_TAG} .
docker push "${IMAGE_TAG}"