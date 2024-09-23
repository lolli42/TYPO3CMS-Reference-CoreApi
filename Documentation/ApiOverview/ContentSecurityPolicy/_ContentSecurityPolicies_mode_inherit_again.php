<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Directive;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Mutation;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\MutationCollection;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\MutationMode;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\Scope;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\SourceKeyword;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\SourceScheme;
use TYPO3\CMS\Core\Security\ContentSecurityPolicy\UriValue;
use TYPO3\CMS\Core\Type\Map;

return Map::fromEntries([
    Scope::frontend(),
    new MutationCollection(
        new Mutation(
            MutationMode::Set,
            Directive::DefaultSrc,
            SourceKeyword::self,
        ),
        new Mutation(
            MutationMode::InheritAgain,
            Directive::ImgSrc,
        ),
        new Mutation(
            MutationMode::Append,
            Directive::ImgSrc,
            new UriValue('example.com'),
        ),
        new Mutation(
            MutationMode::Set,
            Directive::DefaultSrc,
            SourceScheme::data,
        ),
        new Mutation(
            MutationMode::InheritAgain,
            Directive::ScriptSrc,
        ),
    ),
]);